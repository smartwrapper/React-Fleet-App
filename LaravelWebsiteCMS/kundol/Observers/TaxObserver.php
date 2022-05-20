<?php

namespace App\Observers;

use App\Models\Admin\Tax;
use Auth;
use Log;

class TaxObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Tax "created" event.
     *
     * @param  \App\Models\Admin\Tax  $tax
     * @return void
     */
    public function created(Tax $tax)
    {
        $tax->created_by = Auth::id();
        $tax->unsetEventDispatcher();
        $tax->save();
        Log::info($this->logText . ' created a new Tax: ' . $tax);
    }

    /**
     * Handle the Tax "updated" event.
     *
     * @param  \App\Models\Admin\Tax  $tax
     * @return void
     */
    public function updated(Tax $tax)
    {
        $tax->updated_by = Auth::id();
        $tax->unsetEventDispatcher();
        $tax->save();
        Log::info($this->logText . ' updated a tax class: ' . $tax);
    }

    /**
     * Handle the Tax "deleted" event.
     *
     * @param  \App\Models\Admin\Tax  $tax
     * @return void
     */
    public function deleted(Tax $tax)
    {
        $tax->updated_by = Auth::id();
        $tax->unsetEventDispatcher();
        $tax->save();
        Log::info($this->logText . ' deleted a tax class: ' . $tax);
    }
}
