<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethodDescription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'shipping_method_id', 'name', 'language_id'
    ];
    public function ShippingMethod(){

        return $this->belongsTo(ShippingMethod::class,'id','shipping_method_id');
    }

    public function Language(){
        return $this->belongsTo(Language::class);
    }
}
