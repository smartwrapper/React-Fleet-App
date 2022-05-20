<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Currency extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'currency_id' => $this->id,
            'title' => $this->title,
            'code' => $this->code,
            'symbol_position' => $this->symbol_position,
            'exchange_rate' => $this->exchange_rate,
            'decimal_point' => $this->decimal_point,
            'thousand_point' => $this->thousand_point,
            'decimal_place' => $this->decimal_place,
            'is_default' => $this->is_default,
            'status' => $this->status,
            'country_id' => $this->country,
        ];
    }
}
