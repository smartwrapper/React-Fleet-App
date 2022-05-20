<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Tag extends JsonResource
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
            'tag_id' => $this->id,
            'tag_name' => $this->name,
            'gallary' => GallaryResource::collection($this->whenLoaded('gallary')),
        ];
    }
}
