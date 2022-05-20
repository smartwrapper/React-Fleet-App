<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
        $size = Language::count();
        return [
            'name' => 'required|array|size:' . $size,
            'name.*' => 'string|max:255',
            'is_active' => 'nullable|in:1,0',
            'language_id' => 'required|size:' . $size,
        ];
    }


    public function messages()
    {
        return [
            'name.size' => "name fields of all languages are required",
        ];
    }
}
