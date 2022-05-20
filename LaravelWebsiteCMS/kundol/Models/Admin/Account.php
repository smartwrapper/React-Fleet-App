<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'code', 'account_type', 'status', 'parent_id','reference_id','type'
    ];

    public function scopeCoaId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeParentId($query, $id)
    {
        return $query->where('parent_id', $id);
    }

    public function detail()
    {
        return $this->belongsTo(self::class, 'parent');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%')
        ->Orwhere('code', 'like', '%' . $parameter . '%')
        ->Orwhere('account_type', 'like', '%' . $parameter . '%');
    }
}
