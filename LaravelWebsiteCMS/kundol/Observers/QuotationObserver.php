<?php

namespace App\Observers;

use App\Models\Admin\Quotation;
use Auth;
use Log;

class QuotationObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Quotation "created" event.
     *
     * @param  \App\Models\Admin\Quotation  $quotation
     * @return void
     */
    public function created(Quotation $quotation)
    {
        $quotation->created_by = Auth::id();
        $quotation->unsetEventDispatcher();
        $quotation->save();
        Log::info($this->logText . ' created a new Quotation: ' . $quotation);
    }

    /**
     * Handle the Quotation "updated" event.
     *
     * @param  \App\Models\Admin\Quotation  $quotation
     * @return void
     */
    public function updated(Quotation $quotation)
    {
        $quotation->updated_by = Auth::id();
        $quotation->unsetEventDispatcher();
        $quotation->save();
        Log::info($this->logText . ' updated a Quotation: ' . $quotation);
    }

    /**
     * Handle the Quotation "deleted" event.
     *
     * @param  \App\Models\Admin\Quotation  $quotation
     * @return void
     */
    public function deleted(Quotation $quotation)
    {
        $quotation->updated_by = Auth::id();
        $quotation->unsetEventDispatcher();
        $quotation->save();
        Log::info($this->logText . ' deleted a Quotation: ' . $quotation);
    }
}
