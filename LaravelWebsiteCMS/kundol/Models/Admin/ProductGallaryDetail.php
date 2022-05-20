<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallaryDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'gallary_id'
    ];

    public function gallaryDetail()
    {
        return $this->hasMany('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function gallary_detail()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'id', 'gallary_id');
    }

    public function scopeProductId($query, $id)
    {
        return $query->where('product_id', $id);
    }
}
