<?php

namespace App\Observers;

use App\Models\Admin\Warehouse;
use Auth;
use Log;

class WarehouseObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Warehouse "created" event.
     *
     * @param  \App\Models\Admin\Warehouse  $warehouse
     * @return void
     */
    public function created(Warehouse $warehouse)
    {
        $warehouse->created_by = Auth::id();
        $warehouse->unsetEventDispatcher();
        $warehouse->save();
        Log::info($this->logText . ' created a new warehouse: ' . $warehouse);
    }

    /**
     * Handle the Warehouse "updated" event.
     *
     * @param  \App\Models\Admin\Warehouse  $warehouse
     * @return void
     */
    public function updated(Warehouse $warehouse)
    {
        $warehouse->updated_by = Auth::id();
        $warehouse->unsetEventDispatcher();
        $warehouse->save();
        Log::info($this->logText . ' updated a warehouse: ' . $warehouse);
    }

    /**
     * Handle the Warehouse "deleted" event.
     *
     * @param  \App\Models\Admin\Warehouse  $warehouse
     * @return void
     */
    public function deleted(Warehouse $warehouse)
    {
        $warehouse->updated_by = Auth::id();
        $warehouse->unsetEventDispatcher();
        $warehouse->save();
        Log::info($this->logText . ' deleted a warehouse: ' . $warehouse);
    }

}
