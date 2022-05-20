<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'product_id' => 'required|array|exists:products,id',
            // 'product_combination_id' => 'nullable|array|exists:product_combination,id',
            'warehouse_id' => 'nullable|array',
            'stock_status' => 'nullable|array',
            'qty' => 'nullable|array',
            'qty.*' => 'integer',
        ];
    }
}
