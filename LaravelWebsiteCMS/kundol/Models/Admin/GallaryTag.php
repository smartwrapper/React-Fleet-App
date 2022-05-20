<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class GallaryTag extends Model
{
    protected $fillable = [
        'gallary_id', 'tag_id',
    ];

    public $timestamps = false;

    public function tag()
    {
        return $this->belongsTo('App\Models\Admin\Tag', 'tag_id', 'id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }
}
