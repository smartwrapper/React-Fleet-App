<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Slider as SliderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderNavigation extends JsonResource
{
    public function toArray($request)
    {
        return [
            'slider_navigation_id' => $this->id,
            'slider_navigation_name' => $this->name,
            'slider' => SliderResource::collection($this->whenLoaded('slider')),
        ];
    }
}
