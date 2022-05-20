<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table='product_review';
    protected $fillable = ['customer_id','product_id','comment','rating','status','title'];


    public function ScopeType($query)
    {
        $query->where('status','active');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    
}
