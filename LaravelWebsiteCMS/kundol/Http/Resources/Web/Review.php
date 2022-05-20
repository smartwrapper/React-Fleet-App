<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Product as ProductResource;
use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Models\Admin\Customer;
use App\Models\Admin\Product;

class Review extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'product' => new ProductResource($this->whenLoaded('product')),
            'comment' => $this->comment,
            'title' => $this->title,
            'rating' => $this->rating,
            'status' => $this->status,
            'date' => date('d M,Y', strtotime($this->created_at)),
        ];
    }
}
