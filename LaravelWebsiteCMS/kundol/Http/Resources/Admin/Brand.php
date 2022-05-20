<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Brand extends JsonResource
{
    public function toArray($request)
    {
        if (\Request::route()->getName() == 'client.brand.index' || \Request::route()->getName() == 'client.brand.show') {
            return [
                'brand_id' => $this->id,
                'brand_name' => $this->name,
                'brand_slug' => $this->brand_slug,
                'gallary' => $this->gallary->name,
                'brand_status' => $this->status,
            ];
        }
        return [
            'brand_id' => $this->id,
            'brand_name' => $this->name,
            'brand_slug' => $this->brand_slug,
            'gallary' => $this->gallary,
            'brand_status' => $this->status,
        ];
    }
}
