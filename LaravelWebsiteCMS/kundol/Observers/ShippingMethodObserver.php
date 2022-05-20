<?php

namespace App\Observers;

use App\Models\Admin\ShippingMethod;
use Log;
use Auth;

class ShippingMethodObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ShippingMethod "created" event.
     *
     * @param  \App\Models\Admin\ShippingMethod  $shippingMethod
     * @return void
     */
    public function created(ShippingMethod $shippingMethod)
    {
        Log::info($this->logText . 'create a new shipping method' . $shippingMethod);
    }

    /**
     * Handle the ShippingMethod "updated" event.
     *
     * @param  \App\Models\Admin\ShippingMethod  $shippingMethod
     * @return void
     */
    public function updated(ShippingMethod $shippingMethod)
    {
        Log::info($this->logText . 'update shipping method' . $shippingMethod);
    }

    /**
     * Handle the ShippingMethod "deleted" event.
     *
     * @param  \App\Models\Admin\ShippingMethod  $shippingMethod
     * @return void
     */
    public function deleted(ShippingMethod $shippingMethod)
    {
        Log::info($this->logText . 'delete shipping method' . $shippingMethod);
    }

}
