<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $stringMax = 'nullable|string|max:255';
        return [
            'code' => $stringMax,
            'name' => 'required|string|max:255',
            'address' => $stringMax,
            'phone' => $stringMax,
            'email' => 'nullable|email|max:255',
            'status' => 'in:DEFAULT,inactive,active',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',

        ];
    }
}
