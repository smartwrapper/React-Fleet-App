<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SaleReturnDetail extends Model
{
    protected $table = 'sale_return_details';
    public $timestamps = false;
    protected $fillable = [
        'sale_return_id', 'sale_id', 'product_id', 'product_combination_id', 'qty'
    ];

    public function scopeSaleReturnId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeStockCheck($query, $product_id, $product_combination_id,$sale_id)
    {
        return $query->where('product_combination_id', $product_combination_id)->where('product_id', $product_id)->where('sale_id',$sale_id);
    }

    public function sale()
    {
        return $this->belongsTo('App\Models\Admin\Sale');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product');
    }

    public function product_combination()
    {
        return $this->belongsTo('App\Models\Admin\ProductCombination');
    }
}
