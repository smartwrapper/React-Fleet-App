<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['points', 'type','description','reference_id', 'customer_id','status'];


    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    public function ScopeCustomerId($query, $id)
    {
        $query->where('customer_id', $id);
    }

    public function ScopeFindStatus($query, $status)
    {
        $query->where('status', $status);
    }

}
