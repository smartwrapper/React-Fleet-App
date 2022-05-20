<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $nullableStringMax = 'nullable|string|max:255';
        $stringMax = 'required|string|max:255';
        return [
            'first_name' => $stringMax,
            'last_name' => $stringMax,
            'address' => $nullableStringMax,
            'phone' =>$stringMax,
            'mobile' => $stringMax,
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city' => $nullableStringMax,
        ];
    }
}
