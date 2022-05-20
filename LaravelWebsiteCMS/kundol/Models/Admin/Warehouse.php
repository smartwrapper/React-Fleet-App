<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','country_id','state_id','name', 'address', 'phone', 'email', 'status', 'created_by', 'updated_by',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('code', 'like', '%' . $parameter . '%')->orWhere('name', 'like', '%' . $parameter . '%')->orWhere('address', 'like', '%' . $parameter . '%')->orWhere('phone', 'like', '%' . $parameter . '%')->orWhere('email', 'like', '%' . $parameter . '%');
    }

    public function scopeIsDefault($query)
    {
        return $query->where('id','1');
    }
}
