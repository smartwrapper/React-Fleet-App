<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CustomCssJs extends Model
{
    protected $table = 'custom_css_js';
    public $timestamps = false;

    protected $fillable = [
        'before_head_tag', 'end_of_body_tag',
    ];
}
