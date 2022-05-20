<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
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
            'language_name' => $this->name,
            'code' => $this->code,
            'is_default' => $this->is_default,
            'direction' => $this->direction,
            'directory' => $this->directory,
        ];
    }
}
