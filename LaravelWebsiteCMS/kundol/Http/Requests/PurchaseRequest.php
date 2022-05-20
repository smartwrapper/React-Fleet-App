<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $requiredArray = 'bail|required|array';
        $requiredMinRegex = 'bail|required|min:0|regex:/^\d+(\.\d{1,2})?$/';
        return [
            'purchaser_id' => 'bail|required|exists:purchaser,id',
            'purchase_date' => 'bail|required|date|date_format:Y-m-d',
            'description' => 'bail|nullable|string',
            'total_amount' => 'bail|required|min:1|regex:/^\d+(\.\d{1,2})?$/',
            'amount_paid' => $requiredMinRegex,
            'discount_amount' => $requiredMinRegex,
            'amount_due' => $requiredMinRegex,
            'product_id' => 'bail|required|array|exists:products,id',
            'price' => $requiredArray,
            'price.*' => 'bail|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'qty' => $requiredArray,
            'qty.*' => 'bail|min:0|integer',
            'product_total' => $requiredArray,
            'product_total.*' => 'bail|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'warehouse_id' => 'bail|required|exists:warehouses,id',
        ];
    }

    public function messages()
    {
        return [
            'warehouse_id.required' => 'The Warehouse Name field is required',
            'purchaser_id.required' => 'The Purchaser Name field is required',
        ];
    }
}
