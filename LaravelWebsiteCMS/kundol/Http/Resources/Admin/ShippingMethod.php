<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use  App\Http\Resources\Admin\ShippingMethodDescription as ShippingMethodDescriptionResource;
class ShippingMethod extends JsonResource
{
    public function toArray($request)
    {
        return [
            'shipping_method_id' => $this->id,
            'shipping_methods_type_link' => $this->methods_type_link,
            'shipping_method_is_default' => $this->is_default,
            'shipping_method_status' => $this->status,
            'shipping_method_amount' => $this->amount,
            'shipping_method_discription' => ShippingMethodDescriptionResource::collection($this->whenLoaded('ShippingMethodDescriptions')),
        ];
    }
}
