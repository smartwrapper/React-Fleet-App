<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sale_id','product_id','product_combination_id','qty','price','total'
    ];

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
        return $this->belongsTo('App\Models\Admin\ProductCombination','product_combination_id', 'id');
    }

    public function scopeProductCombinationSale($query, $productId, $productCombinationId, $saleId)
    {
        return $query->where('product_id', $productId)->where('product_combination_id', $productCombinationId)->where('sale_id', $saleId);
    }

    public function scopeProductSale($query, $productId, $saleId)
    {
        return $query->where('product_id', $productId)->where('sale_id', $saleId);
    }
    
}
