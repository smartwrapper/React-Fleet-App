<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Country as CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class State extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country_id' => $this->country_id,
            'country' => new CountryResource($this->whenLoaded('country')),
        ];
    }
}
