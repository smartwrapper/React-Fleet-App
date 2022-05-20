<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter';
    public $timestamps = false;

    protected $fillable = [
        'status', 'mailchip_api', 'mailchip_id', 'gallary_id',
    ];
}
