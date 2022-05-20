<?php

namespace App\Observers;

use App\Models\Admin\GallaryDetail;
use Log;
use Auth;

class GallaryDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the GallaryDetail "created" event.
     *
     * @param  \App\Models\Admin\GallaryDetail  $gallaryDetail
     * @return void
     */
    public function created(GallaryDetail $gallaryDetail)
    {
        Log::info($this->logText . ' create a new gallary detail' . $gallaryDetail);
    }

    /**
     * Handle the GallaryDetail "updated" event.
     *
     * @param  \App\Models\Admin\GallaryDetail  $gallaryDetail
     * @return void
     */
    public function updated(GallaryDetail $gallaryDetail)
    {
        Log::info($this->logText . ' update gallary detail' . $gallaryDetail);
    }

    /**
     * Handle the GallaryDetail "deleted" event.
     *
     * @param  \App\Models\Admin\GallaryDetail  $gallaryDetail
     * @return void
     */
    public function deleted(GallaryDetail $gallaryDetail)
    {
        Log::info($this->logText . ' delete gallary detail' . $gallaryDetail);
    }

}
