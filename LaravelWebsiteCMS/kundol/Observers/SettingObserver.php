<?php

namespace App\Observers;

use App\Models\Admin\Setting;
use Auth;
use Log;

class SettingObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }

    /**
     * Handle the Setting "updated" event.
     *
     * @param  \App\Models\Admin\Setting  $setting
     * @return void
     */
    public function updated(Setting $setting)
    {
        $setting->updated_by = Auth::id();
        $setting->unsetEventDispatcher();
        $setting->save();
        Log::info($this->logText . ' updated a setting: ' . $setting);
    }
}
