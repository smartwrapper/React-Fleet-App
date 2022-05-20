<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Membership extends JsonResource
{
    public function toArray($request)
    {
        return [
            'membership_start_from' => $this->start_value,
            'membership_end_form' => $this->end_value,
            'membership_display_text' => $this->display_text,
        ];
    }
}
