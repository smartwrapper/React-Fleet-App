<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Setting extends JsonResource
{
    public function toArray($request)
    {
        return [
            'setting_key' => $this->key,
            'setting_value' => $this->value,
            'setting_type' => $this->type,
        ];
    }
}
