<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Attribute as AttributeResource;
use App\Http\Resources\Admin\VariationDetail as VariationDetailResource;

class Variation extends JsonResource
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
            'id' => $this->id,
            // 'detail' => VariationDetailResource::collection($this->whenLoaded('variation_detail')),
            'detail' => VariationDetailResource::collection($this->variation_detail),
            'attribute' => new AttributeResource($this->whenLoaded('attribute'))
        ];
    }
}
