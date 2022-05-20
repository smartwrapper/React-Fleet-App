<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CoaChild extends JsonResource
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
            'account_title' => $this->account_title,
            'account_type_id' => $this->account_type_id,
            'parent' => $this->parent,
            'narration' => $this->narration,
        ];
    }
}
