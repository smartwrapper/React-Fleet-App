<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $languageSize = Language::count();
        return [
            'category_slug' => 'required|string|max:255',
            'gallary_id' => 'required|exists:gallary,id',
            'category_icon' => 'required|exists:gallary,id',
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'nullable|integer',
            'category_name' => 'required|array|size:' . $languageSize,
            'category_name.*' => 'string|max:255',
            'description' => 'required|array|size:' . $languageSize,
            'description.*' => 'string|required',
            'language_id' => 'required|array|exists:languages,id|size:' . $languageSize,
        ];
    }

    public function messages()
    {
        return [
            'category_name.size' => "category name fields of all languages are required",
            'description.size' => "description fields of all languages are required",
        ];
    }
}
