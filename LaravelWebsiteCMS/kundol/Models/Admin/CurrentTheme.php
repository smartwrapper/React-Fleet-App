<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CurrentTheme extends Model
{
    protected $table = 'current_theme';
    protected $fillable = [
        'home_setting'
    ];
}
