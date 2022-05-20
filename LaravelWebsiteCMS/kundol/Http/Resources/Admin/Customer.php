<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Web\CustomerAddressBook as CustomerAddressBookResource;

class Customer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'customer_id' => $this->id,
            'customer_first_name' => $this->first_name,
            'customer_last_name' => $this->last_name,
            'customer_email' => $this->email,
            'customer_hash' => $this->hash,
            'customer_avatar' => new GallaryResource($this->whenLoaded('gallary')),
            'is_seen' => $this->is_seen,
            'customer_status' => $this->status,
            'customer_address' => CustomerAddressBookResource::collection($this->customer_address_book),
        ];
    }
}
