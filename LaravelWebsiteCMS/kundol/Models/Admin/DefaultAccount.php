<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefaultAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_id', 'type'
    ];

    public function scopeCoaId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function account()
    {
        return $this->belongsTo('App\Models\Admin\Account', 'account_id', 'id');
    }
}
