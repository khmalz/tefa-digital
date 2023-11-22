<?php

namespace App\Services;

use App\Models\Title;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Database\Eloquent\Model;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class GenerateInvoice
{
   protected Model $model;
   protected InvoiceItem $item;

   public function __construct(Model $model, InvoiceItem $item)
   {
      $this->model = $model;
      $this->item = $item;
   }

   public function execute(string $type, array $customFields): Invoice
   {
      $websiteTitle = Title::value('name');

      $client = new Party([
         'name'          => $this->model->name_customer,
         'phone'         => $this->model->number_customer,
      ]);

      $customer = new Party([
         'name' => $type,
         'custom_fields' => $customFields,
      ]);

      return Invoice::make("$websiteTitle SMKN 46")
         ->seller($client)
         ->buyer($customer)
         ->date($this->model->created_at)
         ->dateFormat('d/m/Y h:i:s')
         ->filename("$customer->name - {$this->model->ulid}")
         ->addItem($this->item);
   }
}
