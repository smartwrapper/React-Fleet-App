<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'status' => 'required|in:Disable,Enable',
            'mailchip_api' => 'required|string|max:191',
            'mailchip_id' => 'required|string|max:191',
            'gallary_id' => 'required|exists:gallary,id',
        ];
    }
}
