<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationDetail extends Model
{
    use HasFactory;

    protected $table = 'variation_detail';

    public $timestamps = false;

    protected $fillable = [
        'name', 'language_id', 'variation_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }
}
