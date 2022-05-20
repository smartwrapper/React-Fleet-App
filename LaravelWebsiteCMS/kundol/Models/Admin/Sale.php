<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id','desc','payable','discount','tax_id','tax_amount','amount_paid','due_amount','sale_date','warehouse_id','created_by','updated_by'
    ];

    public function scopeSaleId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function detail()
    {
        return $this->hasMany('App\Models\Admin\SaleDetail');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer');
    }
    
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Admin\Warehouse');
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Admin\Tax');
    }
}
