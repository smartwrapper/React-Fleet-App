<?php

namespace App\Observers;

use App\Models\Admin\Banner;
use Auth;
use Log;

class BannerObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Banner "created" event.
     *
     * @param  \App\Models\Admin\Banner  $banner
     * @return void
     */
    public function created(Banner $banner)
    {
        Log::info($this->logText . 'create a new Banner' . $banner);
    }

    /**
     * Handle the Banner "updated" event.
     *
     * @param  \App\Models\Admin\Banner  $banner
     * @return void
     */
    public function updated(Banner $banner)
    {
        Log::info($this->logText . 'update Banner' . $banner);
    }

    /**
     * Handle the Banner "deleted" event.
     *
     * @param  \App\Models\Admin\Banner  $banner
     * @return void
     */
    public function deleted(Banner $banner)
    {
        Log::info($this->logText . 'delete Banner' . $banner);
    }

}
