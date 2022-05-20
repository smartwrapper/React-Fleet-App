<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\MenuDetail as MenuDetailResource;

class Menu extends JsonResource
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
            'menu_id' => $this->id,
            'type' => $this->type,
            'type_detail' => $this->type_detail,
            'menu_detail' => MenuDetailResource::collection($this->whenLoaded('menu_detail')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
