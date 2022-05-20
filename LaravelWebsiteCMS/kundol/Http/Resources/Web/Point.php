<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Customer as CustomerResource;


class Point extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reference_id' => $this->reference_id,
            'points' => $this->points,
            'description' => $this->description,
            'customer_id' => $this->customer_id,
            'customer_detail' => new CustomerResource($this->customer),
            // 'availableQty' => $this->availableQty,
        ];
    }
}
