<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchaser extends Model
{
    use SoftDeletes;

    protected $table = 'purchaser';
    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone', 'mobile', 'country_id', 'state_id', 'city','created_by','updated_by'
    ];

    public function scopePurchaserId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('first_name', 'like', '%' . $parameter . '%')->orWhere('last_name', 'like', '%' . $parameter . '%')->orWhere('address', 'like', '%' . $parameter . '%')->orWhere('phone', 'like', '%' . $parameter . '%')->orWhere('mobile', 'like', '%' . $parameter . '%');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id', 'id');
    }

}
