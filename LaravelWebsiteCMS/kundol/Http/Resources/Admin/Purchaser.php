<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Country as CountryResource;
use App\Http\Resources\Admin\State as StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Purchaser extends JsonResource
{
    public function toArray($request)
    {
        return [
            'purchaser_id' => $this->id,
            'purchaser_first_name' => $this->first_name,
            'purchaser_last_name' => $this->last_name,
            'purchaser_address' => $this->address,
            'purchaser_phone' => $this->phone,
            'purchaser_mobile' => $this->mobile,
            'country' => new CountryResource($this->whenLoaded('country')),
            'state' => new StateResource($this->whenLoaded('state')),
            'purchaser_city' => $this->city,
        ];
    }
}
