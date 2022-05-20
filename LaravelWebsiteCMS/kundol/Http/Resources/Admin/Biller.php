<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Country as CountryResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\State as StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Biller extends JsonResource
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
            'biller_id' => $this->id,
            'biller_name' => $this->name,
            'company_name' => $this->company_name,
            'vat_number' => $this->vat_number,
            'biller_email' => $this->email,
            'phone_number' => $this->phone_number,
            'biller_address' => $this->address,
            'country' => new CountryResource($this->whenLoaded('country')),
            'state' => new StateResource($this->whenLoaded('state')),
            'biller_city' => $this->city,
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
        ];
    }
}
