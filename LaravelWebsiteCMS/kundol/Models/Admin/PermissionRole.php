<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','permission_id','created_by','updated_by'
    ];

    public function permission()
    {
        return $this->belongsTo('App\Models\Admin\Permission', 'permission_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Admin\Role', 'role_id', 'id');
    }
}
