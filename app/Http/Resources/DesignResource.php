<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DesignResource extends JsonResource
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
            'slogan' => $this->slogan,
            'warna' => $this->color,
            'keterangan' => $this->description,
            'status' => $this->status,
            'price' => $this->price
        ];
    }

    public function with($request)
    {
        return ['status' => true];
    }
}