<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\PaymentMethodDescription as PaymentMethodDescriptionResource;
use App\Http\Resources\Admin\PaymentMethodSetting as PaymentMethodSettingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethod extends JsonResource
{
    public function toArray($request)
    {
        return [
            'payment_method_id' => $this->id,
            'payment_method_name' => $this->payment_method,
            'payment_method_title' => $this->title,
            'payment_method_type' => $this->type,
            'payment_method_status' => $this->status,
            'payment_method_environment' => $this->environment,
            'payment_method_default' => $this->default,
            'payment_setting' => PaymentMethodSettingResource::collection($this->whenLoaded('payment_setting')),
            'payment_description' => PaymentMethodDescriptionResource::collection($this->whenLoaded('payment_description')),
        ];
    }
}
