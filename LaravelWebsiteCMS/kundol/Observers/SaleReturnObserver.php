<?php

namespace App\Observers;

use App\Models\Admin\SaleReturn;
use Auth;
use Log;

class SaleReturnObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the SaleReturn "created" event.
     *
     * @param  \App\Models\Admin\SaleReturn  $saleReturn
     * @return void
     */
    public function created(SaleReturn $saleReturn)
    {
        $saleReturn->created_by = Auth::id();
        $saleReturn->unsetEventDispatcher();
        $saleReturn->save();
        Log::info($this->logText . ' created a new sale return: ' . $saleReturn);
    }

    /**
     * Handle the SaleReturn "updated" event.
     *
     * @param  \App\Models\Admin\SaleReturn  $saleReturn
     * @return void
     */
    public function updated(SaleReturn $saleReturn)
    {
        $saleReturn->updated_by = Auth::id();
        $saleReturn->unsetEventDispatcher();
        $saleReturn->save();
        Log::info($this->logText . ' updated a sale return: ' . $saleReturn);
    }

    /**
     * Handle the SaleReturn "deleted" event.
     *
     * @param  \App\Models\Admin\SaleReturn  $saleReturn
     * @return void
     */
    public function deleted(SaleReturn $saleReturn)
    {
        $saleReturn->updated_by = Auth::id();
        $saleReturn->unsetEventDispatcher();
        $saleReturn->save();
        Log::info($this->logText . ' deleted a sale return: ' . $saleReturn);
    }
}
