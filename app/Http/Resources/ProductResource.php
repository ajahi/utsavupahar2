<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'view_count' => $this->view_count,
            'purchase_price' => $this->purchase_price,
            'stock'=>$this->stock,
            'sell_price' => $this->sell_price,
            'featured' => $this->featured,
            'status' => $this->status,
            'discount' => $this->discount,
            'meta_keyword' => $this->meta_keyword,
            'meta_description' => $this->meta_description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
