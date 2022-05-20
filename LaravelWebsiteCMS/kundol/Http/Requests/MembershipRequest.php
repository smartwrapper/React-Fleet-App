<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
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
        return [
            'start_value' => 'required|array',
            'start_value.*' => 'regex:/^\d+(\.\d{1,2})?$/',
            'end_value' => 'required|array',
            'end_value.*' => 'regex:/^\d+(\.\d{1,2})?$/',
            'display_text' => 'required|array',
            'display_text.*' => 'string|max:191',
        ];
    }
}
