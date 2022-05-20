<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = 0;
        if (isset($this->coupon_setting['id'])) {
            $id = $this->coupon_setting['id'];
        }

        return [
            'code' => 'required|string|max:255|alpha_num|unique:coupon_setting,code,' . $id,
            'description' => 'nullable|string',
            'type' => 'in:DEFAULT,fixed,percentage',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'expiry_date' => 'required|date|date_format:Y-m-d',
            'usage_limit_per_user' => 'nullable|numeric|min:1',
            'usage_limit_per_coupon' => 'nullable|numeric|min:1',
        ];
    }
}
