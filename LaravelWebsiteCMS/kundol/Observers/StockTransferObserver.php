<?php

namespace App\Observers;

use App\Models\Admin\StockTransfer;
use Auth;
use Log;

class StockTransferObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Stock Transfer "created" event.
     *
     * @param  \App\Models\Admin\StockTransfer  $stockTransfer
     * @return void
     */
    public function created(StockTransfer $stockTransfer)
    {
        $stockTransfer->created_by = Auth::id();
        $stockTransfer->unsetEventDispatcher();
        $stockTransfer->save();
        Log::info($this->logText . ' created a new Stock Transfer: ' . $stockTransfer);
    }

    /**
     * Handle the Stock Transfer "updated" event.
     *
     * @param  \App\Models\Admin\StockTransfer  $stockTransfer
     * @return void
     */
    public function updated(StockTransfer $stockTransfer)
    {
        $stockTransfer->updated_by = Auth::id();
        $stockTransfer->unsetEventDispatcher();
        $stockTransfer->save();
        Log::info($this->logText . ' updated a Stock Transfer: ' . $stockTransfer);
    }

    /**
     * Handle the Stock Transfer "deleted" event.
     *
     * @param  \App\Models\Admin\StockTransfer  $stockTransfer
     * @return void
     */
    public function deleted(StockTransfer $stockTransfer)
    {
        $stockTransfer->updated_by = Auth::id();
        $stockTransfer->unsetEventDispatcher();
        $stockTransfer->save();
        Log::info($this->logText . ' deleted a Stock Transfer: ' . $stockTransfer);
    }
}
