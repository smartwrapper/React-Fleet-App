<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxRate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tax_id','country_id','state_id', 'tax_rate', 'description','created_by','updated_by'
    ];

    public function tax()
    {
        return $this->belongsTo('App\Models\Admin\Tax');
    }
    
    public function ScopeFindByState($query, $state_id)
    {
        return $query->where('state_id', $state_id);
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id', 'id');
    }
}
