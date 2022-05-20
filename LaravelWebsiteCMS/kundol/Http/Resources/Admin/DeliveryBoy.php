<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryBoy extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'avatar' => $this->avatar,
            'dob' => $this->dob,
            'blood_group' => $this->blood_group,
            'commission' => $this->commission,
            'pin_code' => $this->pin_code,
            'status' => $this->status,
            'availability_status' => $this->availability_status,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'in_active' => $this->in_active,
            'zip_code' => $this->zip_code,
            'state' => $this->state,
            'vehicle_name' => $this->vehicle_name,
            'owner_name' => $this->owner_name,
            'vehicle_color' => $this->vehicle_color,
            'vehicle_registration_no' => $this->vehicle_registration_no,
            'vehicle_details' => $this->vehicle_details,
            'driving_license_no' => $this->driving_license_no,
            'vehicle_rc_book_no' => $this->vehicle_rc_book_no,
            'account_name' => $this->account_name,
            'account_number' => $this->account_number,
            'gpay_number' => $this->gpay_number,
            'bank_address' => $this->bank_address,
            'ifsc_code' => $this->ifsc_code,
            'branch_name' => $this->branch_name,
        ];
    }
}
