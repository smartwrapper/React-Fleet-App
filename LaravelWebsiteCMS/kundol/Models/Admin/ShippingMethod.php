<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = ['is_default', 'status', 'amount', 'created_by','updated_by'];

    public function ShippingMethodDescriptions()
    {

        return $this->hasMany(ShippingMethodDescription::class, 'shipping_method_id', 'id');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('ShippingMethodDescriptions', function ($querys) use ($parameter) {
            $querys->where('shipping_method_descriptions.name', 'like', '%' . $parameter . '%');
        });
    }

    public function scopeGetShippingMethodByLanguageId($query, $languageId)
    {
        return $query->with(['ShippingMethodDescriptions' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }
    public function scopeGetShippingMethodDetailByLanguageId($query, $languageId, $sortBy, $sortType)
    {
        return $query->orderBy(ShippingMethodDescription::select($sortBy)
            ->whereColumn('shipping_method_descriptions.shipping_method_id', 'shipping_methods.id')->where('language_id', $languageId), $sortType);
    }

    public function scopeShippingMethodId($query, $id)
    {
        return $query->where('id', $id);
    }
}
