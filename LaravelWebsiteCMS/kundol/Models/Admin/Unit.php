<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_active', 'created_by', 'updated_by'
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('detail', function ($querys) use ($parameter) {
            $querys->where('unit_detail.name', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetUnitDetailByLanguageId($query, $languageId)
    {
        return $query->with(['detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function detail()
    {
        return $this->hasMany('App\Models\Admin\UnitDetail', 'unit_id', 'id');
    }

    public function scopeUnitId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSortByunitDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(UnitDetail::select($sortBy)
            ->whereColumn('unit_detail.unit_id', 'units.id')->where('language_id', $languageId), $sortType);
    }
}
