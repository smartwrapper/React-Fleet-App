<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Newsletter extends JsonResource
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
            'status' => $this->status,
            'mailchip_api' => $this->mailchip_api,
            'mailchip_id' => $this->mailchip_id,
            'gallary_id' => GallaryResource::collection($this->whenLoaded('gallary')),
        ];
    }
}
