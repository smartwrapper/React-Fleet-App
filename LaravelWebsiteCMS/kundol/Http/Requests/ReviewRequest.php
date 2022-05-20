<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'title' => 'required|string',
            'comment' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5'
        ];
    }
}
