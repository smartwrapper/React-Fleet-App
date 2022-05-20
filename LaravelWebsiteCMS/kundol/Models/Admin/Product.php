<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin\Setting;

class Product extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_type', 'product_slug', 'video_url', 'gallary_id', 'price', 'discount_price', 'product_unit', 'product_weight', 'product_status', 'brand_id', 'tax_id', 'product_view', 'is_featured', 'product_min_order', 'product_max_order', 'seo_meta_tag', 'seo_desc', 'user_id', 'digital_file', 'created_by', 'updated_by', 'is_points','sku'
    ];

    public function scopeProductId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeNotProductId($query, $id)
    {
        return $query->where('id', '!=', $id);
    }

    public function scopeActive($query)
    {
        return $query->where('product_status', 'active');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('product_slug', $slug);
    }

    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        return $query->with(['detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetAttributeDetailByLanguage($query, $languageId)
    {
        return $query->with('product_attribute.attribute.attribute_detail', function ($querys) use ($languageId) {
            $querys->where('language_id', $languageId);
        });
    }

    public function scopeSortByProductDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(ProductDetail::select($sortBy)
            ->whereColumn('product_detail.product_id', 'products.id')->where('language_id', $languageId), $sortType);
    }


    public function scopeSortByCategory($query, $sortBy, $sortType, $languageId)
    {
        return $query->whereHas('category', function($q) use ($sortBy, $sortType, $languageId){
            $q->orderBy(CategoryDetail::select($sortBy)
            ->whereColumn('product_category.category_id', 'category_detail.category_id')->where('language_id', $languageId), $sortType);
        });
        
        
        
    }

    public function scopeSortByTopSellingProduct($query, $sortBy, $sortType)
    {
        return $query->orderBy(TopSellingProduct::select($sortBy)
            ->whereColumn('top_selling_products.product_id', 'products.id')->whereRaw('1', '1'), $sortType);
    }



    public function scopeGetVariationDetailByLanguage($query, $languageId)
    {
        return $query->with('product_attribute.variation.variation.variation_detail', function ($querys) use ($languageId) {
            $querys->where('language_id', $languageId);
        });
    }

    public function scopeGetProductByPrice($query, $priceFrom, $priceTo)
    {
        $query->whereRaw('IF (`discount_price` > 0,`discount_price` >= '.$priceFrom.' && `discount_price` <= '.$priceTo.',`price` >= '.$priceFrom.' && `price` <= '.$priceTo.')');
        
        // whereBetween('price', [$priceFrom, $priceTo]);
        
        return $query->orWhereHas('product_combination', function($q) use ($priceFrom, $priceTo){
            $q->whereBetween('product_combination.price', [$priceFrom, $priceTo]);
        });
    }

    public function scopeGetCategoryDetailByLanguageId($query, $languageId)
    {
        return $query->with(['category.category.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetBarcodeCategoryDetailByLanguageId($query, $languageId)
    {
        return $query->with(['category.category.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeType($query)
    {
        $type = [];
        if (Gate::allows('isDigital')) {
            $type[] = 'digital';
        } else {
            $type[] = 'simple';
            $type[] = 'variable';
        }
        return $query->whereIn('product_type', $type);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Web\Review', 'product_id', 'id')->where('status', 'active');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Web\Comment', 'product_id', 'id');
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Admin\Tax', 'tax_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Admin\Brand', 'brand_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Admin\Unit', 'product_unit', 'id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Admin\ProductCategory', 'product_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\Admin\ProductDetail', 'product_id', 'id');
    }

    public function top_selling()
    {
        return $this->hasOne('App\Models\Admin\TopSellingProduct', 'product_id', 'id');
    }

    public function product_attribute()
    {
        return $this->hasMany('App\Models\Admin\ProductAttribute', 'product_id', 'id');
    }

    public function product_combination()
    {
        return $this->hasMany('App\Models\Admin\ProductCombination', 'product_id', 'id');
    }

    public function productDetail()
    {
        return $this->hasMany('App\Models\Admin\ProductDetail', 'product_id', 'id');
    }

    public function productGallaryDetail()
    {
        return $this->hasMany('App\Models\Admin\ProductGallaryDetail', 'product_id', 'id');
    }

    public function stock()
    {
        $warehouse_id = Setting::type('pos', 'default_warehouse')->value('value');
        return $this->hasOne(AvailableQty::class, 'product_id', 'id')->where('warehouse_id', $warehouse_id);
    }
}
