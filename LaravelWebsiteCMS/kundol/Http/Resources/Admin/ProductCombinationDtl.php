<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\ProductCombinationDtl as ProductCombinationDtlResource;
use App\Http\Resources\Admin\Variation as VariationResource;


class ProductCombinationDtl extends JsonResource
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
            'variation_id' => $this->variation_id,
            'variation' => new VariationResource($this->variation),
        ];
    }
}