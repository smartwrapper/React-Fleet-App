<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallary extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'gallary';

    protected $fillable = [
        'name', 'extension', 'user_id', 'created_by', 'updated_by',
    ];

    public function detail()
    {
        return $this->hasMany('App\Models\Admin\GallaryDetail', 'gallary_id', 'id');
    }

    public function GallaryDetail()
    {
        return $this->hasMany(GallaryDetail::class);
    }

    public function Brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function Category()
    {
        return $this->hasMany(Category::class);
    }

    public function gallary_tag()
    {
        return $this->hasMany(GallaryTag::class);
    }
}
