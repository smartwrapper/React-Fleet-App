<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = 0;
        if (isset($this->customer['id'])) {
            $id = $this->customer['id'];
        }
        $requiredStringMax = 'required|string|max:255';
        $passwordValidation = 'required|string|max:255';

        if(request()->isMethod('put'))
            $passwordValidation = 'nullable|string|max:255';

        return [
            'first_name' => $requiredStringMax,
            'last_name' => $requiredStringMax,
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'gallary_id' => 'nullable|exists:gallary,id',
            'is_seen' => 'in:DEFAULT,0,1',
            'status' => 'in:DEFAULT,0,1',
            'password' => $passwordValidation,
        ];
    }
}
