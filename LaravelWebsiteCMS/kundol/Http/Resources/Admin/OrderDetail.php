<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;

class OrderDetail extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->order_id,
            'product' => new ProductResource($this->whenLoaded('product')),
            'product_combination' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            'product_combination_id' => $this->product_combination,
            'product_price' => $this->product_price,
            'product_discount' => $this->product_discount,
            'product_tax' => $this->product_tax,
            'product_qty' => $this->qty,
            'product_total' => $this->total,
        ];
    }
}
