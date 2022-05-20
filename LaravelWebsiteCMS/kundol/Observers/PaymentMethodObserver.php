<?php

namespace App\Observers;

use App\Models\Admin\PaymentMethod;
use Auth;
use Log;

class PaymentMethodObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the PaymentMethod "created" event.
     *
     * @param  \App\Models\Admin\PaymentMethod  $paymentMethod
     * @return void
     */
    public function created(PaymentMethod $paymentMethod)
    {
        $paymentMethod->created_by = Auth::id();
        $paymentMethod->unsetEventDispatcher();
        $paymentMethod->save();
        Log::info($this->logText . ' created a new payment method: ' . $paymentMethod);
    }

    /**
     * Handle the PaymentMethod "updated" event.
     *
     * @param  \App\Models\Admin\PaymentMethod  $paymentMethod
     * @return void
     */
    public function updated(PaymentMethod $paymentMethod)
    {
        $paymentMethod->updated_by = Auth::id();
        $paymentMethod->unsetEventDispatcher();
        $paymentMethod->save();
        Log::info($this->logText . ' updated a payment method: ' . $paymentMethod);
    }

    /**
     * Handle the PaymentMethod "deleted" event.
     *
     * @param  \App\Models\Admin\PaymentMethod  $paymentMethod
     * @return void
     */
    public function deleted(PaymentMethod $paymentMethod)
    {
        $paymentMethod->updated_by = Auth::id();
        $paymentMethod->unsetEventDispatcher();
        $paymentMethod->save();
        Log::info($this->logText . ' deleted a payment method: ' . $paymentMethod);
    }
}
