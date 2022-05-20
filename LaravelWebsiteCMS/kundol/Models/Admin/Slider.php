<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'description','text','position','textcontent', 'ref_id', 'url', 'language_id', 'slider_type_id', 'slider_navigation_id', 'created_by', 'updated_by', 'gallary_id',
    ];

    public function scopeSliderId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('sliders.title', 'like', '%' . $parameter . '%');
    }


    public function scopeLanguageId($query, $id)
    {
        return $query->where('language_id', $id);
    }

    public function scopeSliderNavigation($query, $id)
    {
        return $query->where('slider_navigation_id', $id);
    }

    public function scopeSliderTypeSearch($query, $type)
    {
        return $query->where('slider_type_id',$type);
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }

    public function slider_type()
    {
        return $this->belongsTo('App\Models\Admin\SliderType', 'slider_type_id', 'id');
    }

    public function slider_navigation()
    {
        return $this->belongsTo('App\Models\Admin\SliderNavigation', 'slider_navigation_id', 'id');
    }

    public function gallary()
    {
        return $this->belongsTo(Gallary::class, 'gallary_id', 'id');
    }

}
