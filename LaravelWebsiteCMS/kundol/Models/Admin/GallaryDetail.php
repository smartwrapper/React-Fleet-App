<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class GallaryDetail extends Model
{
    use HasFactory;
    protected $table = 'gallary_detail';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gallary_id', 'gallary_type', 'height', 'width', 'path'
    ];

    public function Gallary()
    {
        return $this->belongsTo(Gallary::class);
    }
}
