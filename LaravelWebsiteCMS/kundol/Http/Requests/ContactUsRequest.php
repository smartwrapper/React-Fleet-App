<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rule1 = 'required|string';
        return [
            'first_name' => $rule1,
            'last_name' => $rule1,
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => $rule1,
        ];
    }
}
