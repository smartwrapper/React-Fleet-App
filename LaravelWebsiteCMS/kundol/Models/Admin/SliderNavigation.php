<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SliderNavigation extends Model
{
    protected $table = 'slider_navigation';

    protected $fillable = [
        'name',
    ];

    public function slider()
    {
        return $this->hasMany('App\Models\Admin\Slider');
    }

    public function scopeSliderNavigationId($query, $id)
    {
        return $query->where('id', $id);
    }

}
