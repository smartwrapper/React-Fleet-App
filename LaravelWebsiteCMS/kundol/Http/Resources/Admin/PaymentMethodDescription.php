<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodDescription extends JsonResource
{
    public function toArray($request)
    {
        return [
            'payment_description_id' => $this->id,
            'payment_description_name' => $this->name,
            'payment_description_sub_name_1' => $this->sub_name_1,
            'payment_description_sub_name_2' => $this->sub_name_2,
            'payment_description_language_id' => $this->value,
            'language' => new LanguageResource($this->language),
        ];
    }
}
