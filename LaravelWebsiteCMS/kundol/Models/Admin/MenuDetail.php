<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{

    protected $fillable = [
        'name', 'menu_id', 'language_id'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
