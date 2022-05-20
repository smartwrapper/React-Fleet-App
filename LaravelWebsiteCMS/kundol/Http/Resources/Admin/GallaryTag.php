<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Tag as TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GallaryTag extends JsonResource
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
            'gallary_id' => $this->gallary_id,
            'tag' => new TagResource($this->whenLoaded('tag')),
        ];
    }
}
