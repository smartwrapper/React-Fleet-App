<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillerRequest extends FormRequest
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
        $nullableString = 'nullable|string|max:255';
        $id = 0;
        if (isset($this->biller['id'])) {
            $id = $this->biller['id'];
        }
        return [
            'name' => 'required|string|max:255',
            'gallary_id' => 'required|exists:gallary,id',
            'company_name' => $nullableString,
            'vat_number' => $nullableString,
            'email' => $nullableString . '|email|unique:billers,email,' . $id,
            'phone_number' => $nullableString,
            'address' => $nullableString,
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city' => 'required|string|max:255',
        ];
    }
}
