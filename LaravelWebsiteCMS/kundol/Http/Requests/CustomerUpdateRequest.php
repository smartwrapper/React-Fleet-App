<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $requiredStringMax = 'required|string|max:255';

        return [
            'first_name' => $requiredStringMax,
            'last_name' => $requiredStringMax,
            'password' => 'exclude_if:type,profile|'.$requiredStringMax.'|confirmed'
        ];
    }
}
