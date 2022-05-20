<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StockTransferRequest extends FormRequest
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
    public function rules(Request $request)
    {

        return [
            'reference_no' => 'required|string|max:191',
            'trasfer_date' => 'required|date|date_format:Y-m-d',
            'notes' => 'nullable|string',
            'warehouse_from' => 'required|exists:warehouses,id',
            'warehouse_to' => 'required|exists:warehouses,id|different:warehouse_from',
            'product_id' => 'bail|required|array|exists:products,id',
            // 'product_combination_id' => 'nullable|array|exists:product_combination,id',
            'qty' => 'required|array',
            'qty.*' => 'bail|min:1|integer',
        ];
    }
}
