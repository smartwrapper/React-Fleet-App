<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponOrder extends Model
{
    use HasFactory;
    protected $table = 'coupon_order';

    public function ScopeCustomer($query, $customer)
    {
        $query->where('customer_id', $customer);
    }

    public function ScopeCoupon($query, $coupon)
    {
        $query->where('coupon_code', $coupon);
    }
}
