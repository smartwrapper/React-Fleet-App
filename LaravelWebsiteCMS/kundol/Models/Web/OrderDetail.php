<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    
    public $timestamps = false;
    
    protected $fillable = ['order_id', 'product_id','product_combination_id','product_price','product_discount','product_tax','qty','total'];

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function product_combination()
    {
        return $this->belongsTo('App\Models\Admin\ProductCombination', 'product_combination_id', 'id');
    }

    
}
