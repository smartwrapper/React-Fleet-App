<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderComment extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','customer_id','user_id','message'];

    public function customer(){
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
