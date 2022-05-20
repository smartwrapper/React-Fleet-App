<?php

namespace App\Observers;

use App\Models\Admin\PermissionRole;
use Auth;
use Log;

class PermissionRoleObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the PermissionRole "created" event.
     *
     * @param  \App\Models\Admin\PermissionRole  $permissionRole
     * @return void
     */
    public function created(PermissionRole $permissionRole)
    {
        $permissionRole->created_by = Auth::id();
        $permissionRole->unsetEventDispatcher();
        $permissionRole->save();
        Log::info($this->logText . ' created a new permission role: ' . $permissionRole);
    }

    /**
     * Handle the PermissionRole "updated" event.
     *
     * @param  \App\Models\Admin\PermissionRole  $permissionRole
     * @return void
     */
    public function updated(PermissionRole $permissionRole)
    {
        $permissionRole->updated_by = Auth::id();
        $permissionRole->unsetEventDispatcher();
        $permissionRole->save();
        Log::info($this->logText . ' updated a permission role: ' . $permissionRole);
    }

    /**
     * Handle the PermissionRole "deleted" event.
     *
     * @param  \App\Models\Admin\PermissionRole  $permissionRole
     * @return void
     */
    public function deleted(PermissionRole $permissionRole)
    {
        $permissionRole->updated_by = Auth::id();
        $permissionRole->unsetEventDispatcher();
        $permissionRole->save();
        Log::info($this->logText . ' deleted a permission role: ' . $permissionRole);
    }
}
