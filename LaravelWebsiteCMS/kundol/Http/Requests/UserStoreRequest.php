<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'unique:users,name|required', 
            'email' => 'string|email|unique:users,email|required', 
            'password' => 'required',
            'role_id' => 'required|exists:roles,id',
            'confirm_password' => 'same:password|required', 
            'status' => 'in:DEFAULT,active,inactive,disable',
        ];
    }

}
