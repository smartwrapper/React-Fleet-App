<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'value', 'payment_method_id',
    ];

    public static function set($key, $val, $paymentMethodId = '')
    {
        if ($paymentMethodId != '' && $key != '' && $setting = self::where('key', $key)->where('payment_method_id', $paymentMethodId)->first()) {
            return $setting->update(['value' => $val]);
        }
    }

    public function payment_method()
    {
        return $this->belongsTo('App\Models\Admin\PaymentMethod', 'payment_method_id', 'id');
    }

}
