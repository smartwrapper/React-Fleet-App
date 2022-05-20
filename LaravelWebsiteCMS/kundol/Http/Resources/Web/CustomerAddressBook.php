<?php

namespace App\Http\Resources\Web;

use App\Http\Resources\Admin\Country as CountryResource;
use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Http\Resources\Admin\State as StateResource;
use App\Models\Admin\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerAddressBook extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'company' => $this->company,
            'street_address' => $this->street_address,
            'suburb' => $this->suburb,
            'phone' => $this->phone,
            'postcode' => $this->postcode,
            'dob' => $this->dob,
            'city' => $this->city,
            'country_id' => new CountryResource($this->country),
            'state_id' => new StateResource($this->state),
            'lattitude' => $this->lattitude,
            'latlong' => $this->latlong,
            'longitude' => $this->longitude,
            'default_address' => $this->is_default,
        ];
    }
}
