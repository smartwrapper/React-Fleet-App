<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    use HasFactory;

    protected $table = 'page_detail';

    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'language_id', 'page_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
