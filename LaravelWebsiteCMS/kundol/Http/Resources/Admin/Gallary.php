<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\GallaryDetail as GallaryDetailResource;
use App\Http\Resources\Admin\GallaryTag as GallaryTagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Gallary extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (\Request::route()->getName() == 'products.index' || \Request::route()->getName() == 'products.show') {
            return [
                'id' => $this->id,
                'gallary_name' => $this->name,
                'detail' => GallaryDetailResource::collection($this->whenLoaded('detail')),
                'gallary_tag' => GallaryTagResource::collection($this->whenLoaded('gallary_tag')),
            ];
        }
        return [
            'id' => $this->id,
            'gallary_name' => $this->name,
            'gallary_extension' => $this->extension,
            'user_id' => $this->user_id,
            'detail' => GallaryDetailResource::collection($this->whenLoaded('detail')),
            'gallary_tag' => GallaryTagResource::collection($this->whenLoaded('gallary_tag')),
        ];
    }
}
