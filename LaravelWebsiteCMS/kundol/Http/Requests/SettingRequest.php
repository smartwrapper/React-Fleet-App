<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'required|array',
            'value' => 'required|array',
            'key.*' => 'string|max:255',
            'value.*' => 'nullable|string|max:255',
        ];
    }
}
