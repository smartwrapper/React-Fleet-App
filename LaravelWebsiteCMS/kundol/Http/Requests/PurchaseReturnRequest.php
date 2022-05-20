<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseReturnRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'purchase_id' => 'required|exists:purchase,id',
            'warehouse_id' => 'required|exists:inventory,warehouse_id',
            'product_id' => 'bail|required|array|exists:products,id|exists:purchase_detail,product_id',
            'product_combination_id' => 'bail|nullable|array',
            'product_combination_id.*' => 'nullable|exists:product_combination,id|exists:purchase_detail,product_combination_id',
            'qty' => 'bail|required|array',
            'qty.*' => 'bail|min:0|integer',
            'adjustment' => 'bail|required',
        ];
    }
}
