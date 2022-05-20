<?php

namespace App\Observers;

use App\Models\Admin\Customer;
use Log;
use Auth;

class CustomerObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Customer "created" event.
     *
     * @param  \App\Models\Admin\Customer  $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        Log::info($this->logText . ' create a new customer' . $customer);
    }

    /**
     * Handle the Customer "updated" event.
     *
     * @param  \App\Models\Admin\Customer  $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        Log::info($this->logText . ' update customer' . $customer);
    }

    /**
     * Handle the Customer "deleted" event.
     *
     * @param  \App\Models\Admin\Customer  $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        Log::info($this->logText . ' delete customer' . $customer);
    }

}
