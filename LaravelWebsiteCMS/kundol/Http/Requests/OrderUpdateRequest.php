<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_status' => 'nullable|in:Pending,Inprocess,Dispatched,Complete,Return,Cancel,Shipped',
        ];
    }
}
