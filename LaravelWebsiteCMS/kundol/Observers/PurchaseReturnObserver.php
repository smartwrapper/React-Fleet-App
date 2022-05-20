<?php

namespace App\Observers;

use App\Models\Admin\PurchaseReturn;
use Auth;
use Log;

class PurchaseReturnObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the PurchaseReturn "created" event.
     *
     * @param  \App\Models\Admin\PurchaseReturn  $purchaseReturn
     * @return void
     */
    public function created(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->created_by = Auth::id();
        $purchaseReturn->unsetEventDispatcher();
        $purchaseReturn->save();
        Log::info($this->logText . ' created a new purchase return : ' . $purchaseReturn);
    }

    /**
     * Handle the PurchaseReturn "updated" event.
     *
     * @param  \App\Models\Admin\PurchaseReturn  $purchaseReturn
     * @return void
     */
    public function updated(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->updated_by = Auth::id();
        $purchaseReturn->unsetEventDispatcher();
        $purchaseReturn->save();
        Log::info($this->logText . ' updated a purchase return : ' . $purchaseReturn);
    }

    /**
     * Handle the PurchaseReturn "deleted" event.
     *
     * @param  \App\Models\Admin\PurchaseReturn  $purchaseReturn
     * @return void
     */
    public function deleted(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->updated_by = Auth::id();
        $purchaseReturn->unsetEventDispatcher();
        $purchaseReturn->save();
        Log::info($this->logText . ' deleted a purchase return : ' . $purchaseReturn);
    }
}
