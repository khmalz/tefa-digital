<?php

namespace App\Http\Controllers;

use App\Models\Admin\Order;
use App\Models\Admin\Design;
use Illuminate\Http\Response;
use App\Models\Admin\Printing;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;
use App\Services\GenerateInvoice;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PDFController extends Controller
{
    public function createInvoiceDesign(Order $order): Response
    {
        $order->load('design');

        $customFields = array_filter(
            [
                'Order' => $order->design->category->title,
                'Plan' => $order->design->plan->title,
                'Receipt number' => $order->ulid,
                'Color' => $order->design->color,
                $order->design->slogan ? 'Slogan' : null => $order->design->slogan ?? null,
            ]
        );

        $item = (new InvoiceItem())->title($order->design->category->title)->pricePerUnit($order->design->price);

        $generateInvoice = new GenerateInvoice(
            model: $order,
            item: $item
        );

        $invoice = $generateInvoice->execute('Design', $customFields);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function createInvoicePhotography(Order $order): Response
    {
        $order->load('photography');

        $customFields = [
            'Order' => $order->photography->category->title,
            'Plan' => $order->photography->plan->title,
            'Receipt number' => $order->ulid,
        ];

        $item = (new InvoiceItem())->title($order->photography->category->title)->pricePerUnit($order->photography->price);

        $generateInvoice = new GenerateInvoice(
            model: $order,
            item: $item
        );

        $invoice = $generateInvoice->execute('Photography', $customFields);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function createInvoiceVideography(Order $order): Response
    {
        $order->load('videography');

        $customFields = [
            'Order' => $order->videography->category->title,
            'Plan' => $order->videography->plan->title,
            'Receipt number' => $order->ulid,
        ];

        $item = (new InvoiceItem())->title($order->videography->category->title)->pricePerUnit($order->videography->price);

        $generateInvoice = new GenerateInvoice(
            model: $order,
            item: $item
        );

        $invoice = $generateInvoice->execute('Videography', $customFields);

        // Return the invoice as a response
        return $invoice->stream();
    }

    public function createInvoicePrinting(Order $order): Response
    {
        $order->load('printing');

        $customFields = [
            'Material' => $order->printing->material,
            'Scale' => $order->printing->scale,
            'Receipt number' => $order->ulid,
        ];

        $item = (new InvoiceItem())->title("Printing")->pricePerUnit(0);

        $generateInvoice = new GenerateInvoice(
            model: $order,
            item: $item
        );

        $invoice = $generateInvoice->execute('Printing', $customFields);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
