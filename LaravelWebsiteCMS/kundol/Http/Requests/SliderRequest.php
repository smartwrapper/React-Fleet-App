<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'position' => 'required|string',
            'textcontent' => 'required|string',
            'text' => 'required|string',
            'language_id' => 'required|exists:languages,id',
            'slider_type_id' => 'required|exists:slider_types,id',
            'slider_navigation_id' => 'required|exists:slider_navigation,id',
            'gallary_id' => 'required|exists:gallary,id',
            'ref_id' => 'exclude_if:slider_navigation_id,3,4|required|integer',
            'url' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Slider Name field is required',
        ];
    }

}
