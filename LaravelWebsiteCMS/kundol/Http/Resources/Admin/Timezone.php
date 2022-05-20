<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Timezone extends JsonResource
{
    public function toArray($request)
    {
        return [
            'timezone_id' => $this->id,
            'timezone_name' => $this->name,
            'timezone_offset' => $this->offset,
            'timezone_diff_from_gtm' => $this->diff_from_gtm,
        ];
    }
}
