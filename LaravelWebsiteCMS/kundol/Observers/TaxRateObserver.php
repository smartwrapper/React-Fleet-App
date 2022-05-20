<?php

namespace App\Observers;

use App\Models\Admin\TaxRate;
use Auth;
use Log;

class TaxRateObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the TaxRate "created" event.
     *
     * @param  \App\Models\Admin\TaxRate  $taxRate
     * @return void
     */
    public function created(TaxRate $taxRate)
    {
        $taxRate->created_by = Auth::id();
        $taxRate->unsetEventDispatcher();
        $taxRate->save();
        Log::info($this->logText . ' created a new Tax Rate: ' . $taxRate);
    }

    /**
     * Handle the TaxRate "updated" event.
     *
     * @param  \App\Models\Admin\TaxRate  $taxRate
     * @return void
     */
    public function updated(TaxRate $taxRate)
    {
        $taxRate->updated_by = Auth::id();
        $taxRate->unsetEventDispatcher();
        $taxRate->save();
        Log::info($this->logText . ' updated tax rate: ' . $taxRate);
    }

    /**
     * Handle the TaxRate "deleted" event.
     *
     * @param  \App\Models\Admin\TaxRate  $taxRate
     * @return void
     */
    public function deleted(TaxRate $taxRate)
    {
        $taxRate->updated_by = Auth::id();
        $taxRate->unsetEventDispatcher();
        $taxRate->save();
        Log::info($this->logText . ' deleted a tax rate: ' . $taxRate);
    }
}
