<?php

namespace App\Observers;

use App\Models\Admin\Role;
use Auth;
use Log;

class RoleObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Role "created" event.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        $role->created_by = Auth::id();
        $role->unsetEventDispatcher();
        $role->save();
        Log::info($this->logText . ' created a new role: ' . $role);
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        $role->updated_by = Auth::id();
        $role->unsetEventDispatcher();
        $role->save();
        Log::info($this->logText . ' updated a role: ' . $role);
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \App\Models\Admin\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        $role->updated_by = Auth::id();
        $role->unsetEventDispatcher();
        $role->save();
        Log::info($this->logText . ' deleted a role: ' . $role);
    }
}
