<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\State as StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource
{
    public function toArray($request)
    {
        return [
            'country_id' => $this->id,
            'country_name' => $this->name,
            'states' => StateResource::collection($this->whenLoaded('states')),
        ];
    }
}
