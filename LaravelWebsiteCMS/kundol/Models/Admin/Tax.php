<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description','created_by','updated_by'
    ];

    public function tax_rate()
    {
        return $this->hasMany('App\Models\Admin\TaxRate');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('title', 'like', '%' . $parameter . '%');
    }

}
