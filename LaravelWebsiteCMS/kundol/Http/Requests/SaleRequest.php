<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
        $requiredArray = 'bail|required|array';
        return [
            'customer_id' => 'required|exists:customers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'desc' => 'nullable|string|max:250',
            'payable' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'discount' => 'regex:/^\d+(\.\d{1,2})?$/',
            'tax_id' => 'exists:taxes,id',
            'tax_amount' => 'regex:/^\d+(\.\d{1,2})?$/',
            'amount_paid' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'due_amount' => 'regex:/^\d+(\.\d{1,2})?$/',
            'sale_date' => 'required|date|date_format:Y-m-d',
            'price' => $requiredArray,
            'price.*' => 'bail|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'qty' => $requiredArray,
            'qty.*' => 'bail|min:0|integer',
        ];
    }
}
