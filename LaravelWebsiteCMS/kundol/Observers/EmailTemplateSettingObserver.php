<?php

namespace App\Observers;

use App\Models\Admin\EmailTemplateSetting;
use Auth;
use Log;

class EmailTemplateSettingObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the EmailTemplateSetting "created" event.
     *
     * @param  \App\Models\Admin\EmailTemplateSetting  $EmailTemplateSetting
     * @return void
     */
    public function created(EmailTemplateSetting $emailTemplateSetting)
    {
        $emailTemplateSetting->created_by = Auth::id();
        $emailTemplateSetting->unsetEventDispatcher();
        $emailTemplateSetting->save();
        Log::info($this->logText . ' created a new EmailTemplateSetting: ' . $emailTemplateSetting);
    }

    /**
     * Handle the EmailTemplateSetting "updated" event.
     *
     * @param  \App\Models\Admin\EmailTemplateSetting  $EmailTemplateSetting
     * @return void
     */
    public function updated(EmailTemplateSetting $emailTemplateSetting)
    {
        $emailTemplateSetting->updated_by = Auth::id();
        $emailTemplateSetting->unsetEventDispatcher();
        $emailTemplateSetting->save();
        Log::info($this->logText . ' updated an EmailTemplateSetting: ' . $emailTemplateSetting);
    }

    /**
     * Handle the EmailTemplateSetting "deleted" event.
     *
     * @param  \App\Models\Admin\EmailTemplateSetting  $EmailTemplateSetting
     * @return void
     */
    public function deleted(EmailTemplateSetting $emailTemplateSetting)
    {
        $emailTemplateSetting->updated_by = Auth::id();
        $emailTemplateSetting->unsetEventDispatcher();
        $emailTemplateSetting->save();
        Log::info($this->logText . ' deleted an EmailTemplateSetting: ' . $emailTemplateSetting);
    }
}
