<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $fillable = ['product_id', 'customer_id','product_combination_id','qty', 'session_id','is_order'];

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    // public function availableQty()
    // {
    //     return $this->hasOne('App\Models\Admin\AvailableQty', 'product_id', 'product_id');
    // }

    public function ScopeCustomerId($query, $id)
    {
        $query->where('customer_id', $id);
    }

    public function ScopeProductCategoryDetail($query, $languageId)
    {
        $query->with(['product.category.category.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }
    
    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        $query->with(['product.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }


    public function scopeGetProductVariationByLanguageId($query, $languageId)
    {
        $query->with(['product.product_combination.combination.variation.variation_detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function ScopeType($query)
    {
        $query->whereHas('product' , function ($q) {
            if(Gate::allows('isDigital')){
                $q->where('products.product_type', 'digital');
            }
            else{
                $q->where('products.product_type', '!=' ,'digital');
            }
        });
    }

    public function ScopeProductDetail($query, $languageId)
    {
        return $query->with(['product.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function ScopeAvailableQtys($query)
    {
        if(!Gate::allows('isDigital'))
            $query->leftJoin('avaliable_qty', 'cart_items.product_id', '=', 'avaliable_qty.product_id')->whereRaw('IF (`avaliable_qty`.`product_type` = "variable", `avaliable_qty`.`product_combination_id` = `cart_items`.`product_combination_id`,true)')->select('avaliable_qty.price as prices','avaliable_qty.discount_price as discounts','cart_items.*');
        else
            $query->leftJoin('products', 'cart_items.product_id', '=', 'products.id')->select('products.price as prices','products.discount_price as discounts','cart_items.*');
    }

}
