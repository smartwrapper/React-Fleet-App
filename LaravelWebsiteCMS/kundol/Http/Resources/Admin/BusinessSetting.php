<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\Timezone as TimezoneResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessSetting extends JsonResource
{
    public function toArray($request)
    {
        return [
            'business_id' => $this->id,
            'business_name' => $this->business_name,
            'start_date' => $this->start_date,
            'default_profit_percentage' => $this->default_profit_percentage,
            'year_start_month' => $this->year_start_month,
            'accounting_method' => $this->accounting_method,
            'transaction_edit_days' => $this->transaction_edit_days,
            'date_format' => $this->date_format,
            'time_format' => $this->time_format,
            'time_zone' => $this->timezone_id,
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
            'timezone' => new TimezoneResource($this->whenLoaded('timezone')),
        ];
    }
}
