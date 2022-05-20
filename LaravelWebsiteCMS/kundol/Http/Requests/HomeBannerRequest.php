<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeBannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required',
            'gallary_id' => 'required|exists:gallary,id',
            'language_id' => 'required|exists:languages,id',
        ];
    }
}
