<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use App\Models\Admin\SaleReturnDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleDetail extends JsonResource
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
            'product_id' => new ProductResource($this->whenLoaded('product')),
            'product_combination_id' => new ProductCombinationResource($this->whenLoaded('product_combination')),
            'product_returned_qty' => SaleReturnDetail::stockCheck($this->product_id, $this->product_combination_id, $this->sale_id)->sum('qty'),
            'productCombinationId' => $this->product_combination_id,
            'sale_id' => $this->sale_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'total' => $this->total,
        ];
    }
}
