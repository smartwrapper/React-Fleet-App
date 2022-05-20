<?php

namespace App\Observers;

use App\Models\Admin\BusinessSetting;
use Auth;
use Log;

class BusinessSettingObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the BusinessSetting "created" event.
     *
     * @param  \App\Models\Admin\BusinessSetting  $businessSetting
     * @return void
     */
    public function created(BusinessSetting $businessSetting)
    {
        $businessSetting->created_by = Auth::id();
        $businessSetting->unsetEventDispatcher();
        $businessSetting->save();
        Log::info($this->logText . ' created a new BusinessSetting: ' . $businessSetting);
    }

    /**
     * Handle the BusinessSetting "updated" event.
     *
     * @param  \App\Models\Admin\BusinessSetting  $businessSetting
     * @return void
     */
    public function updated(BusinessSetting $businessSetting)
    {
        $businessSetting->updated_by = Auth::id();
        $businessSetting->unsetEventDispatcher();
        $businessSetting->save();
        Log::info($this->logText . ' updated a BusinessSetting: ' . $businessSetting);
    }

    /**
     * Handle the BusinessSetting "deleted" event.
     *
     * @param  \App\Models\Admin\BusinessSetting  $businessSetting
     * @return void
     */
    public function deleted(BusinessSetting $businessSetting)
    {
        $businessSetting->updated_by = Auth::id();
        $businessSetting->unsetEventDispatcher();
        $businessSetting->save();
        Log::info($this->logText . ' deleted a BusinessSetting: ' . $businessSetting);
    }

}
