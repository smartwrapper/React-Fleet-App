<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
        $size = Language::count();
        $requiredString = 'required|string';
        $nullableString = 'nullable|string';
        $nullableInt = 'nullable|integer';
        $id = 0;
        if ($request->product && isset($request->product->id)) {
            $id = $request->product->id;
        }
        return [
            'product_type' => $requiredString,
            'product_slug' => $nullableString,
            'video_url' => $nullableString,
            'sku' => 'required|unique:products,sku,' . $id,
            'combination_sku' => 'exclude_if:product_type,simple|array',
            'combination_sku.*' => 'exclude_if:product_type,simple|unique:product_combinations,sku',
            'gallary_id' => 'required|exists:gallary,id',
            'gallary_detail_id' => 'required|array|exists:gallary,id',
            'price' => 'exclude_if:product_type,variable|required|regex:/^\d+(\.\d{1,2})?$/',
            'discount_price' => 'nullable|lt:price|regex:/^\d+(\.\d{1,2})?$/',
            'discount_price' => 'exclude_if:product_type,variable|lt:price',
            'product_unit' => 'exclude_if:product_type,digital|required|integer|exists:units,id',
            'product_weight' => 'exclude_if:product_type,digital|' . $requiredString,
            'product_status' => 'in:DEFAULT,active,inactive',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'tax_id' => 'nullable|integer|exists:taxes,id',
            'product_view' => $nullableInt,
            'is_featured' => 'in:DEFAULT,0,1',
            'is_points' => 'in:DEFAULT,0,1',
            'product_min_order' => $nullableInt.'|min:1',
            'product_max_order' => $nullableInt.'|min:1|gt:product_min_order',
            'seo_meta_tag' => 'nullable|string|max:255',
            'seo_desc' => 'nullable|string|max:255',
            'language_id' => 'required|array|exists:languages,id|size:' . $size,
            'title' => 'required|array|size:' . $size,
            'desc' => 'required|array|size:' . $size,
            'title.*' => 'string|max:255',
            'desc.*' => 'string|max:255',
            'category_id' => 'required|array|exists:categories,id',
        ];
    }

    public function attribute()
    {
        return [
            'attributes' => 'required|array|exists:attributes,id',
        ];
    }
}
