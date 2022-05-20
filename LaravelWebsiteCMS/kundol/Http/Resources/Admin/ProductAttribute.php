<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Attribute as AttributeResource;
use App\Http\Resources\Admin\ProductVariation as ProductVariationResource;
use App\Http\Resources\Admin\Variation as VariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttribute extends JsonResource
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
            'product_id' => $this->product_id,
            'attributes' => new AttributeResource($this->attribute),
            'variations' => ProductVariationResource::collection($this->variation),
            // 'product_variation' => VariationResource::collection($this->variation),
            // 'product_variation' => $this->variation[0]->variation->variation_detail
        ];
    }
}
