<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoaRequest extends FormRequest
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
            'account_title' => 'required|string|max:255',
            'account_type_id' => 'required|exists:account_type,id',
            'narration' => 'nullable|max:255|string',
            'parent' => 'nullable|exists:coa,id',
        ];
    }
}
