<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use App\Http\Resources\Admin\Sale as SaleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleReturnDetail extends JsonResource
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
            'sale' => new SaleResource($this->sale),
            'product' => new ProductResource($this->whenLoaded('product')),
            'product_combination_id' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            'productCombinationId' => $this->product_combination_id,
            'qty' => $this->qty,
        ];
    }
}
