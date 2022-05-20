<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type', 'type_detail', 'status'
    ];

    public function scopeMenuId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function menu_detail()
    {
        return $this->hasMany(MenuDetail::class);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('menu_detail', function ($querys) use ($parameter) {
            $querys->where('menu_details.name', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetMenuDetailByLanguageId($query, $languageId)
    {
        return $query->with('menu_detail.language')->with('menu_detail', function ($querys) use ($languageId) {
            $querys->where('menu_details.language_id', $languageId);
        });
    }

    public function scopeSortByMenuDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(MenuDetail::select($sortBy)
            ->whereColumn('menu_details.menu_id', 'menus.id')->where('language_id', $languageId), $sortType);
    }

}
