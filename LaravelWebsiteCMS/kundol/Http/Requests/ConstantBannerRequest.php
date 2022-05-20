<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConstantBannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:191',
            'status' => 'nullable|in:inactive,active',
            'gallary_id' => 'required|exists:gallary,id',
            'url' => 'required',
            'language_id' => 'required|exists:languages,id',
        ];
    }
}
