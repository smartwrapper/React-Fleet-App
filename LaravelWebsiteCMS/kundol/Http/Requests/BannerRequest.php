<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'status' => 'nullable|in:inactive,active',
            'slider_navigation_id' => 'required|exists:slider_navigation,id',
            'gallary_id' => 'required|exists:gallary,id',
            'ref_id' => 'exclude_if:slider_navigation_id,3,4|required|integer',
            'url' => 'nullable',
            'language_id' => 'required|exists:languages,id',
        ];
    }
}
