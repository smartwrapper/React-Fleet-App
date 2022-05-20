<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'refrence' => 'required|string',
            'dr_amount' => 'required',
            'cr_amount' => 'required',
            'account_id' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'dr_amount.required' => 'Amount field is required',
        ];
    }
}
