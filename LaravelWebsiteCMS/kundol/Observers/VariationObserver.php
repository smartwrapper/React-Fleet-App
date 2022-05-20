<?php

namespace App\Observers;

use App\Models\Admin\Variation;
use Auth;
use Log;

class VariationObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Variation "created" event.
     *
     * @param  \App\Models\Admin\Variation  $variation
     * @return void
     */
    public function created(Variation $variation)
    {
        $variation->created_by = Auth::id();
        $variation->unsetEventDispatcher();
        $variation->save();
        Log::info($this->logText . ' created a new variation: ' . $variation);
    }

    /**
     * Handle the Variation "updated" event.
     *
     * @param  \App\Models\Admin\Variation  $variation
     * @return void
     */
    public function updated(Variation $variation)
    {
        $variation->updated_by = Auth::id();
        $variation->unsetEventDispatcher();
        $variation->save();
        Log::info($this->logText . ' updated a variation: ' . $variation);
    }

    /**
     * Handle the Variation "deleted" event.
     *
     * @param  \App\Models\Admin\Variation  $variation
     * @return void
     */
    public function deleted(Variation $variation)
    {
        $variation->updated_by = Auth::id();
        $variation->unsetEventDispatcher();
        $variation->save();
        Log::info($this->logText . ' deleted a variation: ' . $variation);
    }
}
