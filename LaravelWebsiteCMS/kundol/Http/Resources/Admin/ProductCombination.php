<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\ProductCombinationDtl as ProductCombinationDtlResource;
use App\Models\Admin\AvailableQty;
use App\Models\Admin\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCombination extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->exchange_rate = 1;
        if (isset($request->currency) && $request->currency != '') {
             $currency = Currency::findByCurrencyId($request->currency)->select('exchange_rate', 'symbol_position', 'code')->first();
             $this->exchange_rate = $currency->exchange_rate;
        }
        if (\Request::route()->getName() == 'products.index' || \Request::route()->getName() == 'products.show' || \Request::route()->getName() == 'client.wishlist.index') {
            return [
                'product_combination_id' => $this->id,
                'product_id' => $this->product_id,
                'sku' => $this->sku,
                'price' => $this->price * $this->exchange_rate,
                'product_price_symbol' => !isset($currency->symbol_position) ? $this->price * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->price * $this->exchange_rate).' '.$currency->code : $currency->code.' '.($this->price * $this->exchange_rate)),
                'available_qty' => AvailableQty::productId($this->product_id)->productCombinationId($this->id)->value('remaining'),
                'gallary' => new GallaryResource($this->gallary),
                'combination' => ProductCombinationDtlResource::collection($this->combination),
            ];
        }
        else{
            return [
                'product_combination_id' => $this->id,
                'product_id' => $this->product_id,
                'sku' => $this->sku,
                'price' => $this->price,
                'available_qty' => AvailableQty::productId($this->product_id)->productCombinationId($this->id)->value('remaining'),
                'gallary' => new GallaryResource($this->gallary),
                'combination' => ProductCombinationDtlResource::collection($this->combination),
            ];
        }
    }
}
