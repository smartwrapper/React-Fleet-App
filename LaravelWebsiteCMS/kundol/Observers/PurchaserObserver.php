<?php

namespace App\Observers;

use App\Models\Admin\Purchaser;
use Auth;
use Log;

class PurchaserObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Purchaser "created" event.
     *
     * @param  \App\Models\Admin\Purchaser  $purchaser
     * @return void
     */
    public function created(Purchaser $purchaser)
    {
        $purchaser->created_by = Auth::id();
        $purchaser->unsetEventDispatcher();
        $purchaser->save();
        Log::info($this->logText . ' created a new purchaser: ' . $purchaser);
    }

    /**
     * Handle the Purchaser "updated" event.
     *
     * @param  \App\Models\Admin\Purchaser  $purchaser
     * @return void
     */
    public function updated(Purchaser $purchaser)
    {
        $purchaser->updated_by = Auth::id();
        $purchaser->unsetEventDispatcher();
        $purchaser->save();
        Log::info($this->logText . ' updated a purchaser: ' . $purchaser);
    }

    /**
     * Handle the Purchaser "deleted" event.
     *
     * @param  \App\Models\Admin\Purchaser  $purchaser
     * @return void
     */
    public function deleted(Purchaser $purchaser)
    {
        $purchaser->updated_by = Auth::id();
        $purchaser->unsetEventDispatcher();
        $purchaser->save();
        Log::info($this->logText . ' deleted a purchaser: ' . $purchaser);
    }
}
