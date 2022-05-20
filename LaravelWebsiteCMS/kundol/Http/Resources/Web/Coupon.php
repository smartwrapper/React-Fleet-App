<?php

namespace App\Http\Resources\Web;

use App\Models\Admin\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class Coupon extends JsonResource
{
    public function toArray($request)
    {
        $this->exchange_rate = 1;
        $currency = [];
        if (isset($request->currency) && $request->currency != '') {
             $currency = Currency::findByCurrencyId($request->currency)->select('exchange_rate', 'symbol_position', 'code')->first();
             $this->exchange_rate = $currency->exchange_rate;
        }
        return [
            'coupon_code' => $this->code,
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type,
            'currency' => $currency,
        ];
    }
}
