<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{

    protected $table = 'purchase_detail';
    public $timestamps = false;

    protected $fillable = [
        'purchase_id', 'product_id', 'product_combination_id', 'price', 'qty', 'product_total',
    ];

    public function scopePurchaseDetailId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeProductId($query, $id)
    {
        return $query->where('product_id', $id);
    }

    public function scopeProductCombinationPurchase($query, $productId, $productCombinationId, $purchaseId)
    {
        return $query->where('product_id', $productId)->where('product_combination_id', $productCombinationId)->where('purchase_id', $purchaseId);
    }

    public function scopeProductPurchase($query, $productId, $purchaseId)
    {
        return $query->where('product_id', $productId)->where('purchase_id', $purchaseId);
    }

    public function purchase()
    {
        return $this->belongsTo('App\Models\Admin\Purchase', 'purchase_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function product_combination()
    {
        return $this->belongsTo('App\Models\Admin\ProductCombination', 'product_combination_id', 'id');
    }

}
