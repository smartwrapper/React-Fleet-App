<?php

namespace App\Observers;

use App\Models\Admin\PaymentMethodDescription;
use Log;
use Auth;

class PaymentMethodDescriptionObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the PaymentMethodDescription "created" event.
     *
     * @param  \App\Models\Admin\PaymentMethodDescription  $paymentMethodDescription
     * @return void
     */
    public function created(PaymentMethodDescription $paymentMethodDescription)
    {
        Log::info($this->logText . ' created a new payment method description: ' . $paymentMethodDescription);
    }

    /**
     * Handle the PaymentMethodDescription "updated" event.
     *
     * @param  \App\Models\Admin\PaymentMethodDescription  $paymentMethodDescription
     * @return void
     */
    public function updated(PaymentMethodDescription $paymentMethodDescription)
    {
        Log::info($this->logText . ' Update payment method description: ' . $paymentMethodDescription);
    }

    /**
     * Handle the PaymentMethodDescription "deleted" event.
     *
     * @param  \App\Models\Admin\PaymentMethodDescription  $paymentMethodDescription
     * @return void
     */
    public function deleted(PaymentMethodDescription $paymentMethodDescription)
    {
        Log::info($this->logText . ' Delete payment method description: ' . $paymentMethodDescription);
    }

}
