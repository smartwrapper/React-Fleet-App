<?php

namespace App\Observers;

use App\Models\Admin\Inventory;
use Auth;
use Log;

class InventoryObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Inventory "created" event.
     *
     * @param  \App\Models\Admin\Inventory  $inventory
     * @return void
     */
    public function created(Inventory $inventory)
    {
        $inventory->created_by = Auth::id();
        $inventory->unsetEventDispatcher();
        $inventory->save();
        Log::info($this->logText . ' created a new inventory: ' . $inventory);
    }

    /**
     * Handle the Inventory "updated" event.
     *
     * @param  \App\Models\Admin\Inventory  $inventory
     * @return void
     */
    public function updated(Inventory $inventory)
    {
        $inventory->updated_by = Auth::id();
        $inventory->unsetEventDispatcher();
        $inventory->save();
        Log::info($this->logText . ' updated an inventory: ' . $inventory);
    }

    /**
     * Handle the Inventory "deleted" event.
     *
     * @param  \App\Models\Admin\Inventory  $inventory
     * @return void
     */
    public function deleted(Inventory $inventory)
    {
        $inventory->updated_by = Auth::id();
        $inventory->unsetEventDispatcher();
        $inventory->save();
        Log::info($this->logText . ' deleted an inventory: ' . $inventory);
    }
}
