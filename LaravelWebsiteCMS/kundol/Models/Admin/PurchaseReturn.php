<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseReturn extends Model
{
    use SoftDeletes;

    protected $table = 'purchase_return';
    protected $fillable = [
        'adjustment', 'created_by', 'updated_by',
    ];

    public function scopePurchaseReturnId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function purchaseReturnDetail()
    {
        return $this->hasMany('App\Models\Admin\PurchaseReturnDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

}
