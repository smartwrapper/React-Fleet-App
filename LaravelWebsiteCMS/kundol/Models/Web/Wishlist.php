<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'wishlist';
    protected $fillable = ['product_id', 'customer_id'];

    public function products()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function ScopeCustomerId($query, $id)
    {

        $query->where('customer_id', $id);
    }

    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        return $query->with(['products.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetCategoryDetailByLanguageId($query, $languageId)
    {
        return $query->with(['products.category.category.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function ScopeWishlistId($query, $id)
    {

        $query->where('id', $id);
    }

}
