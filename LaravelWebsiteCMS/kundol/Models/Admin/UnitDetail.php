<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UnitDetail extends Model
{
    protected $table = 'unit_detail';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id','name','language_id'
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Admin\Language','language_id','id');
    }
}
