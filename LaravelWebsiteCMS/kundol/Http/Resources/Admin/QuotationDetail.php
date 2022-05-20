<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuotationDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => new ProductResource($this->whenLoaded('product')),
            'qty' => $this->qty,
            'product_combination' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            'product_combination_id' => $this->product_combination_id,
            'price' => $this->price,
            'subtotal' => $this->subtotal,
        ];
    }
}
