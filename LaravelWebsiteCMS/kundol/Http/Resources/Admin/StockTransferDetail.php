<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StockTransferDetail extends JsonResource
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
            'quantity' => $this->qty,
            'product' => new ProductResource($this->whenLoaded('product')),
            'product_combination' => new ProductCombinationResource($this->whenLoaded('product_combination')),
        ];
    }
}
