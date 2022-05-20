<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attribute_id',
        'created_by',
        'updated_by',
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Models\Admin\Attribute', 'attribute_id', 'id');
        // ->withTrashed();
    }

    public function scopeGetVariationDetailByLanguageId($query, $languageId)
    {
        return $query->with('variation_detail', function ($querys) use ($languageId) {
            $querys->where('variation_detail.language_id', $languageId);
        });
    }

    public function scopeGetAttributeDetailByLanguageId($query, $languageId)
    {
        return $query->with('attribute.attribute_detail', function ($querys) use ($languageId) {
            $querys->where('attribute_detail.language_id', $languageId);
        });
    }

    public function scopeSortByVariationDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(VariationDetail::select($sortBy)
                ->whereColumn('variation_detail.variation_id', 'variations.id')->where('language_id', $languageId), $sortType);
    }

    public function scopeSortByAttributeDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(AttributeDetail::select($sortBy)
                ->whereColumn('attribute_detail.attribute_id', 'variations.attribute_id')->where('language_id', $languageId), $sortType);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->Where(function($query) use ($parameter) {
            $query->whereIn('variations.attribute_id',AttributeDetail::where('attribute_detail.name', 'like', '%' . $parameter . '%')->pluck('attribute_id'))
                  ->orWhereHas('variation_detail', function ($querys) use ($parameter) {
                    $querys->where('variation_detail.name', 'like', '%' . $parameter . '%');
                });
        });
    }

    public function scopeVariationId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function variation_detail()
    {
        return $this->hasMany(VariationDetail::class);
    }
}
