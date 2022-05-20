<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $table = 'purchase';
    protected $fillable = [
        'purchaser_id', 'warehouse_id', 'purchase_date', 'description', 'total_amount', 'amount_paid', 'discount_amount', 'amount_due', 'created_by', 'updated_by',
    ];

    public function scopePurchaseId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function purchaser()
    {
        return $this->belongsTo('App\Models\Admin\Purchaser', 'purchaser_id', 'id');
    }

    public function purchase_detail()
    {
        return $this->hasMany('App\Models\Admin\PurchaseDetail');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Admin\Warehouse', 'warehouse_id', 'id');
    }

}
