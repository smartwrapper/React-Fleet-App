<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $table = 'inventory';

    protected $fillable = [
        'product_id', 'warehouse_id', 'customer_id', 'stock_status', 'reference_id', 'qty', 'product_combination_id', 'stock_type', 'created_by', 'updated_by',
    ];

    public function ScopeStockTransfer($query, $id)
    {
        return $query->where('stock_type', 'StockTransfer')->where('reference_id', $id);
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Admin\Warehouse', 'warehouse_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('warehouse_id',$parameter)
        ->Orwhere('product_id',$parameter)
        ->Orwhere('stock_status',$parameter);
    }


}
