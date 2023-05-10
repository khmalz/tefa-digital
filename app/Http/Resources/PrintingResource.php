<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrintingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->ulid,
            'nama' => $this->name_customer,
            'nomor' => $this->number_customer,
            'email' => $this->email_customer,
            'material' => $this->material,
            'scale' => $this->scale,
            'keterangan' => $this->description,
            'status' => $this->status,
        ];
    }

    public function with($request)
    {
        return ['status' => true];
    }
}