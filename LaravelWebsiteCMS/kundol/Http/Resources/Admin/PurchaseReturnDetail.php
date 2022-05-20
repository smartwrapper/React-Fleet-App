<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use App\Http\Resources\Admin\Purchase as PurchaseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseReturnDetail extends JsonResource
{
    public function toArray($request)
    {
        return [
            'purchase_return_id' => $this->purchase_return_id,
            'purchase' => new PurchaseResource($this->whenLoaded('purchase')),
            // 'product_combination' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            // 'product' => new ProductResource($this->whenLoaded('product')),
            'product' => new ProductResource($this->product),
            'product_combination' => new ProductCombinationResource($this->product_combination),
            'product_combination_id' => $this->product_combination_id,
            'quantity' => $this->qty,
        ];
    }
}
