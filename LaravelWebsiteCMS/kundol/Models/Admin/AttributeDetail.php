<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeDetail extends Model
{
    use HasFactory;

    protected $table = 'attribute_detail';

    public $timestamps = false;

    protected $fillable = [
        'name', 'language_id', 'attribute_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
