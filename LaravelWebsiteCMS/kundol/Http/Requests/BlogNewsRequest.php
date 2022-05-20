<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class BlogNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $size = Language::count();
        return [
            'gallary_id' => 'required|exists:gallary,id',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'is_featured' => 'in:DEFAULT,0,1',
            'slug' => 'required|string|max:255',
            'name' => 'required|array|size:' . $size,
            'name.*' => 'string|max:255',
            'language_id' => 'required|array|exists:languages,id|size:' . $size,
            'desc' => 'required|array|size:' . $size,
            'desc.*' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'name.size' => "name fields of all languages are required",
            'desc.size' => "Desc fields of all languages are required",
        ];
    }
}
