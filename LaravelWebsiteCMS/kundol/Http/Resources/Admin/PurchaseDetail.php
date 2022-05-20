<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use App\Models\Admin\PurchaseReturnDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseDetail extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product' => new ProductResource($this->whenLoaded('product')),
            'variation' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            'product_price' => $this->price,
            'product_qty' => $this->qty,
            'product_combination_id' => $this->product_combination_id,
            'product_returned_qty' => PurchaseReturnDetail::stockCheck($this->product_id, $this->product_combination_id, $this->purchase_id)->sum('qty'),
            'total_amount' => $this->product_total,
        ];
    }
}
