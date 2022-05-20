<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'customer_id' => $this->id,
            'customer_first_name' => $this->first_name,
            'customer_last_name' => $this->last_name,
            'customer_email' => $this->email,
        ];
    }
}
