<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
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
        $priceFormat = 'regex:/^\d+(\.\d{1,2})?$/';
        return [
            // 'biller_id' => 'required|exists:billers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            // 'tax_id' => 'nullable|exists:taxes,id',
            // 'gallary_id' => 'nullable|exists:gallary,id',
            // 'discount_amount' => 'nullable|' . $priceFormat,
            // 'tax_amount' => 'nullable|' . $priceFormat,
            'grand_total' => 'required|' . $priceFormat,
            // 'status' => 'required|in:DEFAULT,Pending,Sent',
            'type' => 'in:DEFAULT,sale,purchase',
            'purchaser_id' => 'nullable|required_if:type,purchase|exists:purchaser,id',
            'customer_id' => 'nullable|required_if:type,sale|exists:customers,id',
            // 'shipping_cost' => 'nullable|' . $priceFormat,
            'note' => 'nullable',
            'product_id' => 'bail|required|array|exists:products,id',
            // 'product_combination_id' => 'bail|nullable|array|exists:products,id',
            'product_combination_id' => 'bail|nullable|array',
            'product_combination_id.*' => 'nullable|exists:product_combination,id',
            'price' => 'required|array',
            'price.*' => $priceFormat,
            'qty' => 'required|array',
            'qty.*' => 'required|integer',
            'subtotal' => 'required|array',
            'subtotal.*' => $priceFormat,
        ];
    }
}
