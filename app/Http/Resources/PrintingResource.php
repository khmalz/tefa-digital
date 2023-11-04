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
            'order_id' => $this->order->ulid,
            'nama' => $this->order->name_customer,
            'date' => $this->created_at->format('d F Y'),
            'material' => $this->material,
            'scale' => $this->scale,
            'status' => $this->order->status
        ];
    }

    public function with($request)
    {
        return ['status' => true];
    }
}
