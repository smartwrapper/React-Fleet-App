<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AvailableQty extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'avaliable_qty';

    public function ScopeProductId($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    public function ScopeMinPrice($query)
    {
        return $query->min('price');
    }

    public function ScopeProductCombinationId($query, $productCombinationId)
    {
        return $query->where('product_combination_id', $productCombinationId);
    }

    public function ScopeWarehouseId($query, $warehouseId)
    {
        return $query->where('warehouse_id', $warehouseId);
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Admin\Warehouse', 'warehouse_id', 'id');
    }
}
