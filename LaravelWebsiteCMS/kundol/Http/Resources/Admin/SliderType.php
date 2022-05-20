<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Slider as SliderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderType extends JsonResource
{
    public function toArray($request)
    {
        return [
            'slider_type_id' => $this->id,
            'slider_type_name' => $this->name,
            'slider' => SliderResource::collection($this->whenLoaded('slider')),
        ];
    }
}
