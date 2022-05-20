<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponSetting extends Model
{
    use SoftDeletes;

    protected $table = 'coupon_setting';

    protected $fillable = [
        'code', 'description', 'type', 'amount', 'expiry_date', 'usage_limit_per_user', 'usage_limit_per_coupon','created_by','updated_by'
    ];
    
    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('code', 'like', '%' . $parameter . '%')->orWhere('description', 'like', '%' . $parameter . '%');
    }
}
