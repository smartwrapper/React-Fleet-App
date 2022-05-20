<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Models\Admin\Customer;
use App\Models\Admin\Product;

class Comment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'product' => new ProductResource($this->whenLoaded('product')),
            'comment' => $this->comment,
            'parent_id' => $this->parent_id
        ];
    }
}
