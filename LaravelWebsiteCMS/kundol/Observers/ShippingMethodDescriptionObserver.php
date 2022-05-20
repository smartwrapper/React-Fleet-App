<?php

namespace App\Observers;

use App\Models\Admin\ShippingMethodDescription;
use Log;
use Auth;

class ShippingMethodDescriptionObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ShippingMethodDescription "created" event.
     *
     * @param  \App\Models\Admin\ShippingMethodDescription  $shippingMethodDescription
     * @return void
     */
    public function created(ShippingMethodDescription $shippingMethodDescription)
    {
        Log::info($this->logText . 'create a new shipping method description' . $shippingMethodDescription);
    }

    /**
     * Handle the ShippingMethodDescription "updated" event.
     *
     * @param  \App\Models\Admin\ShippingMethodDescription  $shippingMethodDescription
     * @return void
     */
    public function updated(ShippingMethodDescription $shippingMethodDescription)
    {
        Log::info($this->logText . 'update shipping method description' . $shippingMethodDescription);
    }

    /**
     * Handle the ShippingMethodDescription "deleted" event.
     *
     * @param  \App\Models\Admin\ShippingMethodDescription  $shippingMethodDescription
     * @return void
     */
    public function deleted(ShippingMethodDescription $shippingMethodDescription)
    {
        Log::info($this->logText . 'delete shipping method description' . $shippingMethodDescription);
    }

}
