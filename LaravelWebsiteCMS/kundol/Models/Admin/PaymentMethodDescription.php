<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodDescription extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'payment_method_id', 'name', 'language_id', 'sub_name_1', 'sub_name_2',
    ];

    public function payment_method()
    {
        return $this->belongsTo('App\Models\Admin\PaymentMethod', 'payment_method_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }
}
