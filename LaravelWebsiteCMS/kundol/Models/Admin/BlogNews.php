<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogNews extends Model
{
    use SoftDeletes;

    protected $table = 'blog_news';

    protected $fillable = [
        'gallary_id', 'blog_category_id', 'status', 'is_featured', 'slug', 'created_by', 'updated_by',
    ];

    public function scopeBlogNewsId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeGetBlogDetailByLanguageId($query, $languageId)
    {
        return $query->with(['blogNewsDetail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetBlogCategoryDetailByLanguageId($query, $languageId)
    {
        return $query->with(['blogCategory.blogCategoryDetail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('blogNewsDetail', function ($querys) use ($parameter) {
            $querys->where('blog_news_detail.name', 'like', '%' . $parameter . '%')->orWhere('blog_news_detail.desc', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeSortByBlogNewsDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(BlogNewsDetail::select($sortBy)
                ->whereColumn('blog_news_detail.blog_news_id', 'blog_news.id')->where('language_id', $languageId), $sortType);
    }

    public function scopeBlogSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function blogCategory()
    {
        return $this->belongsTo('App\Models\Admin\BlogCategory', 'blog_category_id', 'id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function blogNewsDetail()
    {
        return $this->hasMany('App\Models\Admin\BlogNewsDetail', 'blog_news_id', 'id');
    }
}
