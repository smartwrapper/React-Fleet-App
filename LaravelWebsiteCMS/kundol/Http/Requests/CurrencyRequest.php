<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = 0;
        if (isset($this->currency['id'])) {
            $id = $this->currency['id'];
        }

        $validationNullableMax = 'nullable|max:255';
        $validationRequiredMax = 'required|max:255';

        return [
            'title' => 'required',
            'symbol_position' => 'in:DEFAULT,left,right',
            'code' => 'required',
            'country_id' => 'required|exists:countries,id|unique:currency,country_id,' . $id,
            'decimal_point' => $validationRequiredMax,
            'thousand_point' => $validationNullableMax,
            'decimal_place' => $validationNullableMax,
            'status' => 'in:DEFAULT,inactive,active',
            'is_default' => 'in:DEFAULT,1,0',
            'exchange_rate' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
