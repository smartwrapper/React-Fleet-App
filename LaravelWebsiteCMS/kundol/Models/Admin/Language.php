<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'direction', 'directory', 'is_default', 'created_by', 'updated_by',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%')->orWhere('code', 'like', '%' . $parameter . '%');
    }

    public function scopeNotLanguageId($query, $id)
    {
        return $query->where('id', '!=', $id);
    }

    public function scopeLanguageId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeDefaultLanguage($query)
    {
        return $query->where('is_default', '1');
    }
}
