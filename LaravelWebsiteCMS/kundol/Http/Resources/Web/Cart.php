<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\ProductDetail as ProductDetailResource;
use App\Http\Resources\Admin\ProductCategory as ProductCategoryResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Models\Admin\Gallary;
use App\Models\Admin\ProductCombinationDtl;
use App\Http\Resources\Admin\ProductCombinationDtl as ProductCombinationDtlResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use App\Models\Admin\Currency;

class Cart extends JsonResource
{
    public function toArray($request)
    {
        $this->exchange_rate = 1;
        $currency = [];
        if (isset($request->currency) && $request->currency != '') {
            $currency = Currency::findByCurrencyId($request->currency)->select('exchange_rate', 'symbol_position', 'code')->first();
            $this->exchange_rate = $currency->exchange_rate;
        }

        $priceToConsider = 0 ; 
        if($this->discounts > 0){
            $priceToConsider = ($this->discounts * $this->exchange_rate);
        }
        else{
            $priceToConsider = ($this->prices * $this->exchange_rate);
        }

        return [
            'session' => $this->session_id,
            'product_id' => $this->product_id,
            'product_weight' => $this->product->product_weight ? $this->product->product_weight : 0,
            'product_type' => $this->product->product_type,
            'product_combination_id' => $this->product_combination_id,
            'product_combination' => ProductCombinationDtlResource::collection(ProductCombinationDtl::where('product_combination_id', $this->product_combination_id)->get()),
            'combination' => ProductCombinationResource::collection($this->when($this->product->product_type == 'variable', $this->product->product_combination)),
            'qty' => $this->qty,
            'product_detail' => ProductDetailResource::collection($this->product->detail),
            'product_gallary' => new GallaryResource(Gallary::with('detail')->find($this->product->gallary_id)),
            'customer' => $this->customer,
            'category_detail' => ProductCategoryResource::collection($this->product->category),
            'price' => $this->prices * $this->exchange_rate,
            'product_price_symbol' => !isset($currency->symbol_position) ? $this->prices * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->prices * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->prices * $this->exchange_rate)),
            'discount_price' => $this->discounts * $this->exchange_rate,
            'product_discount_price_symbol' => !isset($currency->symbol_position) ? $this->discounts * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->discounts * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->discounts * $this->exchange_rate)),
            'total' => $priceToConsider * $this->qty,
            'currency' => $currency,
            // 'availableQty' => $this->availableQty,
        ];
    }
}
