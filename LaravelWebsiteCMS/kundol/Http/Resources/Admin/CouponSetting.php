<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponSetting extends JsonResource
{
    public function toArray($request)
    {
        return [
            'coupon_id' => $this->id,
            'coupon_code' => $this->code,
            'coupon_description' => $this->description,
            'coupon_type' => $this->type,
            'coupon_amount' => $this->amount,
            'coupon_expiry_date' => $this->expiry_date,
            'coupon_usage_limit_per_user' => $this->usage_limit_per_user,
            'coupon_usage_limit_per_coupon' => $this->usage_limit_per_coupon,
        ];
    }
}
