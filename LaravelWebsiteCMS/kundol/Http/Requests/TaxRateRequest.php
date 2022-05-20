<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxRateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tax_id' => 'required|exists:taxes,id',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'tax_rate' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable|string',
        ];
    }
}
