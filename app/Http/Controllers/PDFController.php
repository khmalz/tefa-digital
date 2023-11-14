<?php

namespace App\Http\Controllers;

use App\Models\Admin\Order;
use App\Services\GenerateInvoice;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Http\Response;

class PDFController extends Controller
{
    public function createInvoice(Order $order, $title, $customFields): Response
    {
        $item = (new InvoiceItem())
            ->title($order->orderable->category->title ?? $title)
            ->pricePerUnit($title === 'Printing' ? 0 : $order->orderable->price);

        if ($title != "Printing") {
            $customFields['Order'] = $order->orderable->category->title;
            $customFields['Plan'] = $order->orderable->plan->title;
        }
        $customFields['Receipt number'] = $order->ulid;

        $generateInvoice = new GenerateInvoice(
            model: $order,
            item: $item
        );

        $invoice = $generateInvoice->execute($title, $customFields);

        return $invoice->stream();
    }

    public function createInvoiceDesign(Order $order): Response
    {
        $order->load('orderable');

        $customFields = array_filter(
            [
                'Color' => $order->orderable->color,
                $order->orderable->slogan ? 'Slogan' : null => $order->orderable->slogan ?? null,
            ]
        );

        return $this->createInvoice($order, 'Design', $customFields);
    }

    public function createInvoicePhotography(Order $order): Response
    {
        $order->load('orderable');

        return $this->createInvoice($order, 'Photography', []);
    }

    public function createInvoiceVideography(Order $order): Response
    {
        $order->load('orderable');

        return $this->createInvoice($order, 'Videography', []);
    }

    public function createInvoicePrinting(Order $order): Response
    {
        $order->load('orderable');

        $customFields = [
            'Material' => $order->orderable->material,
            'Scale' => $order->orderable->scale,
        ];

        return $this->createInvoice($order, 'Printing', $customFields);
    }
}
