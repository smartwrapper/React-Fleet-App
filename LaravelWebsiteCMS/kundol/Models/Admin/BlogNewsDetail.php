<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BlogNewsDetail extends Model
{
    protected $table = 'blog_news_detail';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_news_id', 'name', 'language_id', 'desc',
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }

    public function blogNews()
    {
        return $this->belongsTo('App\Models\Admin\BlogNews', 'blog_news_id', 'id');
    }
}
