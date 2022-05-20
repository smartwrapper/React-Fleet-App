<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplateSetting extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'subject','body','type','created_by','updated_by'
    ];

    public function scopeSettingId($query, $id)
    {
        return $query->where('id', $id);
    }
}
