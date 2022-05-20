<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\AttributeDetail;

class Attribute extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'created_by', 'updated_by',
    ];

    public function scopeAttributeId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('attribute_detail', function ($querys) use ($parameter) {
            $querys->where('attribute_detail.name', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetAttributeDetailByLanguageId($query, $languageId)
    {
        return $query->with('attribute_detail.language')->with('attribute_detail', function ($querys) use ($languageId) {
            $querys->where('attribute_detail.language_id', $languageId);
        });
    }

    public function scopeGetVariationDetailByLanguageId($query, $languageId)
    {
        return $query->with('variation.variation_detail')->with('variation.variation_detail', function ($querys) use ($languageId) {
            $querys->where('variation_detail.language_id', $languageId);
        });
    }

    public function scopeSortByAttributeDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(AttributeDetail::select($sortBy)
            ->whereColumn('attribute_detail.attribute_id', 'attributes.id')->where('language_id', $languageId), $sortType);
    }

    public function variation()
    {
        return $this->hasMany('App\Models\Admin\Variation');
    }

    public function attribute_detail()
    {
        return $this->hasMany(AttributeDetail::class);
    }
}
