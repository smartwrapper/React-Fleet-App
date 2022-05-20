<?php

namespace App\Observers;

use App\Models\Admin\UnitDetail;
use Log;
use Auth;

class UnitDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the UnitDetail "created" event.
     *
     * @param  \App\Models\Admin\UnitDetail  $unitDetail
     * @return void
     */
    public function created(UnitDetail $unitDetail)
    {
        Log::info($this->logText . 'create a new unit detail' . $unitDetail);
    }

    /**
     * Handle the UnitDetail "updated" event.
     *
     * @param  \App\Models\Admin\UnitDetail  $unitDetail
     * @return void
     */
    public function updated(UnitDetail $unitDetail)
    {
        Log::info($this->logText . 'update unit detail' . $unitDetail);
    }

    /**
     * Handle the UnitDetail "deleted" event.
     *
     * @param  \App\Models\Admin\UnitDetail  $unitDetail
     * @return void
     */
    public function deleted(UnitDetail $unitDetail)
    {
        Log::info($this->logText . 'delete unit detail' . $unitDetail);
    }

}
