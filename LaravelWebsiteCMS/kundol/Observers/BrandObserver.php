<?php

namespace App\Observers;

use App\Models\Admin\Brand;
use Auth;
use Log;

class BrandObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Brand "created" event.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return void
     */
    public function created(Brand $brand)
    {
        $brand->created_by = Auth::id();
        $brand->unsetEventDispatcher();
        $brand->save();
        Log::info($this->logText . ' created a new brand: ' . $brand);
    }

    /**
     * Handle the Brand "updated" event.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return void
     */
    public function updated(Brand $brand)
    {
        $brand->updated_by = Auth::id();
        $brand->unsetEventDispatcher();
        $brand->save();
        Log::info($this->logText . ' updated a brand: ' . $brand);
    }

    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        $brand->updated_by = Auth::id();
        $brand->unsetEventDispatcher();
        $brand->save();
        Log::info($this->logText . ' deleted a brand: ' . $brand);
    }
}
