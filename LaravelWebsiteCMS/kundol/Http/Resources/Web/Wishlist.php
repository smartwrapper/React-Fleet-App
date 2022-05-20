<?php

namespace App\Http\Resources\Web;

use App\Http\Resources\Admin\Product as ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Wishlist extends JsonResource
{
    public function toArray($request)
    {
        return [
            'wishlist' => $this->id,
            'products' => new ProductResource($this->whenLoaded('products')),
            'product_id' => $this->product_id,
            'customer_id' => $this->customer_id,
        ];
    }
}
