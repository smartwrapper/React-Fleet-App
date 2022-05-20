<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'required|array|exists:payment_method_settings,key',
            'key.*' => 'string|max:255',
            'value' => 'nullable|array',
            'value.*' => 'string|max:255',
        ];
    }
}
