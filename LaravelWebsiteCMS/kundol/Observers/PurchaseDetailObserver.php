<?php

namespace App\Observers;

use App\Models\Admin\PurchaseDetail;
use Log;
use Auth;

class PurchaseDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the PurchaseDetail "created" event.
     *
     * @param  \App\Models\Admin\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function created(PurchaseDetail $purchaseDetail)
    {
        Log::info($this->logText . 'create a new purchase detail' . $purchaseDetail);
    }

    /**
     * Handle the PurchaseDetail "updated" event.
     *
     * @param  \App\Models\Admin\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function updated(PurchaseDetail $purchaseDetail)
    {
        Log::info($this->logText . 'update purchase detail' . $purchaseDetail);
    }

    /**
     * Handle the PurchaseDetail "deleted" event.
     *
     * @param  \App\Models\Admin\PurchaseDetail  $purchaseDetail
     * @return void
     */
    public function deleted(PurchaseDetail $purchaseDetail)
    {
        Log::info($this->logText . 'delete purchase detail' . $purchaseDetail);
    }

}
