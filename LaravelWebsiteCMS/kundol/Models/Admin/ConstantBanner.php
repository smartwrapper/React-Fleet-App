<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConstantBanner extends Model
{
    protected $fillable = [
        'title', 'url', 'language_id', 'gallary_id', 'status', 'created_by', 'updated_by',
    ];
    
    public function scopeConstantBannerId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeConstantBannerTitle($query, $id)
    {
        return $query->where('title', $id);
    }

    public function scopeContantBannerLanguage($query, $language_id)
    {
        return $query->where('language_id', $language_id);
    }

    

    public function gallary()
    {
        return $this->belongsTo(Gallary::class, 'gallary_id');
    }
    
    public function language()
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }
}
