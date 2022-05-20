<?php

namespace App\Observers;

use App\Models\User;
use Auth;
use Log;

class UserObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->updated_by = Auth::id();
        $user->unsetEventDispatcher();
        $user->save();
        Log::info($this->logText . ' created a new user: ' . $user);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $user->updated_by = Auth::id();
        $user->unsetEventDispatcher();
        $user->save();
        Log::info($this->logText . ' updated an user: ' . $user);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->updated_by = Auth::id();
        $user->unsetEventDispatcher();
        $user->save();
        Log::info($this->logText . ' deleted an user: ' . $user);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        $user->updated_by = Auth::id();
        $user->unsetEventDispatcher();
        $user->save();
    }
}
