<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
    ];

    public function scopePageId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('page_detail', function ($querys) use ($parameter) {
            $querys->where('page_detail.title', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetPageDetailByLanguageId($query, $languageId)
    {
        return $query->with('page_detail.language')->with('page_detail', function ($querys) use ($languageId) {
            $querys->where('page_detail.language_id', $languageId);
        });
    }

    public function scopeSortByPageDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(PageDetail::select($sortBy)
                ->whereColumn('page_detail.page_id', 'pages.id')->where('language_id', $languageId), $sortType);
    }

    public function page_detail()
    {
        return $this->hasMany(PageDetail::class);
    }

}
