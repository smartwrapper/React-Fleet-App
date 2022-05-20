<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            // 'name' => 'nullable|unique:users,name,'.$this->user['name'],
            'name' => 'nullable', 

            // 'email' => 'email|required|unique:users,email,'.$this->user['email'],
            'password' => 'nullable',
            // 'role_id' => 'required|exists:roles,id',
            'confirm_password' => 'same:password', 
            'status' => 'in:DEFAULT,active,inactive,disable',
        ];
    }

}