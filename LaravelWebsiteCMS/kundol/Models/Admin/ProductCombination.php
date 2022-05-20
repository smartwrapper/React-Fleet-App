<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductCombination extends Model
{
    protected $table = 'product_combination';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'sku', 'price', 'gallary_id'
    ];
    
    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary','gallary_id','id');
    }

    public function combination()
    {
        return $this->hasMany('App\Models\Admin\ProductCombinationDtl','product_combination_id','id');
    }
}
