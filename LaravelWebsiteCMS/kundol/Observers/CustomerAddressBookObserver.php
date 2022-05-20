<?php

namespace App\Observers;

use App\Models\Web\CustomerAddressBook;
use Log;
use Auth;

class CustomerAddressBookObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the CustomerAddressBook "created" event.
     *
     * @param  \App\Models\Admin\CustomerAddressBook  $customerAddressBook
     * @return void
     */
    public function created(CustomerAddressBook $customerAddressBook)
    {
        Log::info($this->logText . 'create a new customer Address Book' . $customerAddressBook);
    }

    /**
     * Handle the CustomerAddressBook "updated" event.
     *
     * @param  \App\Models\Admin\CustomerAddressBook  $customerAddressBook
     * @return void
     */
    public function updated(CustomerAddressBook $customerAddressBook)
    {
        Log::info($this->logText . 'update customer Address Book' . $customerAddressBook);
    }

    /**
     * Handle the CustomerAddressBook "deleted" event.
     *
     * @param  \App\Models\Admin\CustomerAddressBook  $customerAddressBook
     * @return void
     */
    public function deleted(CustomerAddressBook $customerAddressBook)
    {
        Log::info($this->logText . 'delete customer Address Book' . $customerAddressBook);
    }

}
