<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $size = Language::count();
        return [
            'name' => 'required|array|size:' . $size,
            'name.*' => 'string|max:255',
            'language_id' => 'required|array|exists:languages,id|size:' . $size,
            'gallary_id' => 'required|integer|exists:gallary,id',
            'status' => 'in:DEFAULT,inactive,active',
            'blog_category_slug' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.size' => "name fields of all languages are required",
        ];
    }
}
