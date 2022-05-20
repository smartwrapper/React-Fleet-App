<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategoryDetail extends Model
{
    use HasFactory;
    protected $table = 'blog_category_detail';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'blog_category_id', 'language_id',
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Admin\Language', 'language_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\BlogCategory', 'blog_category_id', 'id');
    }
}
