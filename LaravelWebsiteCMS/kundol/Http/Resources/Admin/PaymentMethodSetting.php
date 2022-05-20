<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodSetting extends JsonResource
{
    public function toArray($request)
    {
        return [
            'payment_method_key' => $this->key,
            'payment_method_value' => $this->value,
        ];
    }
}
