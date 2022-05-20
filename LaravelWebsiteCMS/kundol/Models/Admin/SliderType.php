<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SliderType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function slider()
    {
        return $this->hasMany('App\Models\Admin\Slider');
    }

    public function scopeSliderTypeId($query, $id)
    {
        return $query->where('id', $id);
    }

}
