<?php

namespace App\Observers;

use App\Models\Admin\Language;
use Auth;
use Log;

class LanguageObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Language "created" event.
     *
     * @param  \App\Models\Admin\Language  $language
     * @return void
     */
    public function created(Language $language)
    {
        $language->created_by = Auth::id();
        $language->unsetEventDispatcher();
        $language->save();
        Log::info($this->logText . ' created a new language: ' . $language);
    }

    /**
     * Handle the Language "updated" event.
     *
     * @param  \App\Models\Admin\Language  $language
     * @return void
     */
    public function updated(Language $language)
    {
        $language->updated_by = Auth::id();
        $language->unsetEventDispatcher();
        $language->save();
        Log::info($this->logText . ' updated a language: ' . $language);
    }

    /**
     * Handle the Language "deleted" event.
     *
     * @param  \App\Models\Admin\Language  $language
     * @return void
     */
    public function deleted(Language $language)
    {
        $language->updated_by = Auth::id();
        $language->unsetEventDispatcher();
        $language->save();
        Log::info($this->logText . ' deleted a language: ' . $language);
    }
}
