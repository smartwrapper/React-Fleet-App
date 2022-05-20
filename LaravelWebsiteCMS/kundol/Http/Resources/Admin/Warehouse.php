<?php

namespace App\Http\Resources\Admin;

use App\Models\Admin\TaxRate;
use Illuminate\Http\Resources\Json\JsonResource;

class Warehouse extends JsonResource
{
    public function toArray($request)
    {
        return [
            'warehouse_id' => $this->id,
            'warehouse_code' => $this->code,
            'warehouse_name' => $this->name,
            'warehouse_address' => $this->address,
            'warehouse_phone' => $this->phone,
            'warehouse_email' => $this->email,
            'warehouse_status' => $this->status,
            'warehouse_state_id' => $this->state_id,
            'warehouse_country_id' => $this->country_id,
            'warehouse_tax' => TaxRate::where('state_id',$this->state_id)->get(),


        ];
    }
}
