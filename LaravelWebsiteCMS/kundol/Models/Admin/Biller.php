<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biller extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'name', 'gallary_id', 'company_name', 'vat_number', 'email', 'phone_number', 'address', 'country_id', 'state_id', 'city', 'created_by', 'updated_by',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%')->orWhere('company_name', 'like', '%' . $parameter . '%');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id');
    }
}
