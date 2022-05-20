<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'offset', 'diff_from_gtm',
    ];
}
