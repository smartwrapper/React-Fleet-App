<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\BlogCategoryDetail;

class BlogCategory extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'blog_category_slug','gallary_id', 'status', 'created_by', 'updated_by',
    ];

    public function scopeBlogCategoryId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('blogCategoryDetail', function ($querys) use ($parameter) {
            $querys->where('blog_category_detail.name', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetBlogCategoryDetail($query, $languageId)
    {
        return $query->with('blogCategoryDetail', function ($querys) use ($languageId) {
            $querys->where('language_id', $languageId);
        });
    }

    public function scopeSortByCategoryDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(BlogCategoryDetail::select($sortBy)
            ->whereColumn('blog_category_detail.blog_category_id', 'blog_categories.id')->where('language_id', $languageId), $sortType);
    }

    public function blogCategoryDetail()
    {
        return $this->hasMany('App\Models\Admin\BlogCategoryDetail', 'blog_category_id', 'id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }
}
