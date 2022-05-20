<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable = [
        'name', 'iso_code_2', 'iso_code_3', 'address_formate_id', 'country_code',
    ];

    public function scopeCountryId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%');
    }

    public function states()
    {
        return $this->hasMany('App\Models\Admin\State');
    }
}
