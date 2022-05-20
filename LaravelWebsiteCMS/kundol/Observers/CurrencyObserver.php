<?php

namespace App\Observers;

use App\Models\Admin\Currency;
use Auth;
use Log;

class CurrencyObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Currency "created" event.
     *
     * @param  \App\Models\Admin\Currency  $currency
     * @return void
     */
    public function created(Currency $currency)
    {
        $currency->created_by = Auth::id();
        $currency->unsetEventDispatcher();
        $currency->save();
        Log::info($this->logText . ' created a new currency: ' . $currency);
    }

    /**
     * Handle the Currency "updated" event.
     *
     * @param  \App\Models\Admin\Currency  $currency
     * @return void
     */
    public function updated(Currency $currency)
    {
        $currency->updated_by = Auth::id();
        $currency->unsetEventDispatcher();
        $currency->save();
        Log::info($this->logText . ' updated a currency: ' . $currency);
    }

    /**
     * Handle the Currency "deleted" event.
     *
     * @param  \App\Models\Admin\Currency  $currency
     * @return void
     */
    public function deleted(Currency $currency)
    {
        $currency->updated_by = Auth::id();
        $currency->unsetEventDispatcher();
        $currency->save();
        Log::info($this->logText . ' deleted a currency: ' . $currency);
    }
}
