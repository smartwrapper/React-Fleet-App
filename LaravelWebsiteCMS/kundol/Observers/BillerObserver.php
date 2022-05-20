<?php

namespace App\Observers;

use App\Models\Admin\Biller;
use Auth;
use Log;

class BillerObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Biller "created" event.
     *
     * @param  \App\Models\Admin\Biller  $biller
     * @return void
     */
    public function created(Biller $biller)
    {
        $biller->created_by = Auth::id();
        $biller->unsetEventDispatcher();
        $biller->save();
        Log::info($this->logText . ' created a new biller: ' . $biller);
    }

    /**
     * Handle the Biller "updated" event.
     *
     * @param  \App\Models\Admin\Biller  $biller
     * @return void
     */
    public function updated(Biller $biller)
    {
        $biller->updated_by = Auth::id();
        $biller->unsetEventDispatcher();
        $biller->save();
        Log::info($this->logText . ' updated a biller: ' . $biller);
    }

    /**
     * Handle the Biller "deleted" event.
     *
     * @param  \App\Models\Admin\Biller  $biller
     * @return void
     */
    public function deleted(Biller $biller)
    {
        $biller->updated_by = Auth::id();
        $biller->unsetEventDispatcher();
        $biller->save();
        Log::info($this->logText . ' deleted a biller: ' . $biller);
    }
}
