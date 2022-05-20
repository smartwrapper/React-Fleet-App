<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','status','default','environment', 'created_by', 'updated_by',
    ];

    public function scopePaymentMethodId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('payment_description', function ($querys) use ($parameter) {
            $querys->where('payment_method_descriptions.name', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetPaymentDetailByLanguageId($query, $languageId)
    {
        return $query->with(['payment_description' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function payment_description()
    {
        return $this->hasMany('App\Models\Admin\PaymentMethodDescription');
    }

    public function payment_setting()
    {
        return $this->hasMany('App\Models\Admin\PaymentMethodSetting');
    }

}
