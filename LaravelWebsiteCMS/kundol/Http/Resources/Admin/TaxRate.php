<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\State as StateResource;
use App\Http\Resources\Admin\Tax as TaxResource;
use App\Models\Admin\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class TaxRate extends JsonResource
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
            'tax_rate_id' => $this->id,
            'tax_id' => $this->tax_id,
            'tax_state_id' => $this->state_id,
            'tax_country_id' => $this->country_id,
            'tax_amount' => $this->tax_rate * $this->exchange_rate,
            'tax_amount_symbol' => !isset($currency->symbol_position) ? $this->tax_rate * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->tax_rate * $this->exchange_rate).' '.$currency->code : $currency->code.' '.($this->tax_rate * $this->exchange_rate)), 'currency' => $currency,
            'tax_description' => $this->description,
            'tax' => new TaxResource($this->whenLoaded('tax')),
            'state' => new StateResource($this->whenLoaded('state')),
        ];
    }
}
