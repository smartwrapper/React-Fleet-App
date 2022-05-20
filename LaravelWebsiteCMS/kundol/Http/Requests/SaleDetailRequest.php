<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleDetailRequest extends FormRequest
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
        $requiredArray = 'required|array';
        return [
            'product_id' => 'required|array|exists:products,id',
            'qty' => $requiredArray,
            'qty.*' => 'integer',
            'price' => $requiredArray,
            'price.*' => 'integer',
            'total' => $requiredArray,
            'total.*' => 'integer',
        ];
    }
}
