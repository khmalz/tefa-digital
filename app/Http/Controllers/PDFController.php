<?php

namespace App\Http\Controllers;

use App\Models\Admin\Design;
use Illuminate\Http\Response;
use App\Models\Admin\Printing;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;
use App\Services\GenerateInvoice;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PDFController extends Controller
{
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

        $generateInvoice = new GenerateInvoice(
            model: $design,
            item: $item
        );

        $invoice = $generateInvoice->execute('Design', $customFields);

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

        $generateInvoice = new GenerateInvoice(
            model: $photography,
            item: $item
        );

        $invoice = $generateInvoice->execute('Photography', $customFields);

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

        $generateInvoice = new GenerateInvoice(
            model: $videography,
            item: $item
        );

        $invoice = $generateInvoice->execute('Videography', $customFields);

        // Return the invoice as a response
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

        $generateInvoice = new GenerateInvoice(
            model: $printing,
            item: $item
        );

        $invoice = $generateInvoice->execute('Printing', $customFields);

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
