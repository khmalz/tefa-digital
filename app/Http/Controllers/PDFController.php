<?php

namespace App\Http\Controllers;

use App\Models\Admin\Design;
use Illuminate\Http\Response;
use App\Models\Admin\Printing;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Database\Eloquent\Model;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PDFController extends Controller
{
    private function makeInvoice(Model $model, string $type, array $customFields, InvoiceItem $item): Invoice
    {
        $client = new Party([
            'name'          => $model->name_customer,
            'phone'         => $model->number_customer,
        ]);

        $customer = new Party([
            'name' => $type,
            'custom_fields' => $customFields,
        ]);

        return Invoice::make('Tefa Digital SMKN 46')
            ->seller($client)
            ->buyer($customer)
            ->date($model->created_at)
            ->dateFormat('d/m/Y h:i:s')
            ->filename("$customer->name - $model->ulid")
            ->addItem($item);
    }

    public function createInvoiceDesign(Design $design): Response
    {
        $customFields = array_filter(
            [
                'Order' => $design->order,
                'Plan' => $design->plan->title,
                'Receipt number' => $design->ulid,
                'Color' => $design->color,
                $design->slogan ? 'Slogan' : null => $design->slogan ?? null,
            ]
        );

        $item = (new InvoiceItem())->title($design->order)->pricePerUnit($design->price);

        $invoice = $this->makeInvoice($design, 'Design', $customFields, $item);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function createInvoicePhotography(Photography $photography): Response
    {
        $customFields = [
            'Order' => $photography->order,
            'Plan' => $photography->plan->title,
            'Receipt number' => $photography->ulid,
        ];

        $item = (new InvoiceItem())->title($photography->order)->pricePerUnit($photography->price);

        $invoice = $this->makeInvoice($photography, 'Photography', $customFields, $item);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function createInvoiceVideography(Videography $videography): Response
    {
        $customFields = [
            'Order' => $videography->order,
            'Plan' => $videography->plan->title,
            'Receipt number' => $videography->ulid,
        ];

        $item = (new InvoiceItem())->title($videography->order)->pricePerUnit($videography->price);

        $invoice = $this->makeInvoice($videography, 'Videography', $customFields, $item);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function createInvoicePrinting(Printing $printing): Response
    {
        $customFields = [
            'Material' => $printing->material,
            'Scale' => $printing->scale,
            'Receipt number' => $printing->ulid,
        ];

        $item = (new InvoiceItem())->title("Printing")->pricePerUnit(0);

        $invoice = $this->makeInvoice($printing, 'Printing', $customFields, $item);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
