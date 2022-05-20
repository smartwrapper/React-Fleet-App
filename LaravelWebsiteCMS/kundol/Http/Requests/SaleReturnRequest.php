<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleReturnRequest extends FormRequest
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
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|array|exists:products,id',
            'product_combination_id' => 'bail|nullable|array',
            'product_combination_id.*' => 'nullable|exists:product_combination,id|exists:sale_details,product_combination_id',
            'qty' => 'required|array',
            'qty.*' => 'integer',
            'adjustment' => 'required',
        ];
    }
}
