<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'billing_first_name','billing_last_name','billing_company','billing_street_aadress','billing_suburb','billing_city','billing_postcode','billing_country','billing_state','billing_phone','delivery_first_name','delivery_last_name','delivery_company','delivery_street_aadress','delivery_suburb','delivery_city','delivery_postcode','delivery_country','delivery_state','delivery_phone','cc_type','cc_owner','cc_number','cc_expiry','currency_id','currency_value','order_price','shipping_cost','shipping_method','shipping_duration','order_notes','is_seen','coupon_code','coupon_amount','payment_method','transaction_id','order_status','total_tax','delivery_boy_id','latlong'];

    public function ScopeGetOrderByStatus($query, $status)
    {
        return $query->orWhere('order_status', $status);
    }

    public function ScopeGetCustomerOrders($query, $customerId)
    {
        return $query->where('customer_id', $customerId);
    }

    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        return $query->with(['detail.product.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeFindOrderBydate($query, $dateFrom, $dateTo)
    {
        return $query->whereBetween('created_at', [$dateFrom, $dateTo]);
    }

    public function detail()
    {
        return $this->hasMany('App\Models\Web\OrderDetail', 'order_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\Admin\Currency', 'currency_id', 'id');
    }

    public function billing_country1()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'billing_country', 'id');
    }

    public function billing_state1()
    {
        return $this->belongsTo('App\Models\Admin\State', 'billing_state', 'id');
    }

    public function delivery_country1()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'delivery_country', 'id');
    }

    public function delivery_state1()
    {
        return $this->belongsTo('App\Models\Admin\State', 'delivery_state', 'id');
    }

    public function order_history()
    {
        return $this->hasMany('App\Models\Web\OrderHistory', 'order_id', 'id');
    }

    public function ordernotes()
    {
        return $this->hasMany('App\Models\Admin\OrderNote', 'order_id', 'id');
    }

    public function ordercomments()
    {
        return $this->hasMany('App\Models\Admin\OrderComment', 'order_id', 'id');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('orders.order_status', 'like', '%' . $parameter . '%')
        ->Orwhere('orders.order_price', 'like', '%' . $parameter . '%')
        ->Orwhere('orders.payment_method', 'like', '%' . $parameter . '%');
    }
    
    
}
