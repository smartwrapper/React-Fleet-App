<?php

namespace App\Observers;

use App\Models\Admin\Gallary;
use Log;
use Auth;

class GallaryObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Gallary "created" event.
     *
     * @param  \App\Models\Admin\Gallary  $gallary
     * @return void
     */
    public function created(Gallary $gallary)
    {
        Log::info($this->logText . ' created a new gallary ' . $gallary);
    }

    /**
     * Handle the Gallary "updated" event.
     *
     * @param  \App\Models\Admin\Gallary  $gallary
     * @return void
     */
    public function updated(Gallary $gallary)
    {
        Log::info($this->logText . ' Update gallary ' . $gallary);
    }

    /**
     * Handle the Gallary "deleted" event.
     *
     * @param  \App\Models\Admin\Gallary  $gallary
     * @return void
     */
    public function deleted(Gallary $gallary)
    {
        Log::info($this->logText . ' delete gallary ' . $gallary);
    }

}
