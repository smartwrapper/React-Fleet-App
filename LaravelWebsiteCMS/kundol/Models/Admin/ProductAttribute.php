<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attribute';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'attribute_id'
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Models\Admin\Attribute','attribute_id','id');
    }

    public function variation()
    {
        return $this->hasMany('App\Models\Admin\ProductVariation','product_attribute_id','id');
    }
}
