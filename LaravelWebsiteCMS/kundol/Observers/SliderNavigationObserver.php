<?php

namespace App\Observers;

use App\Models\Admin\SliderNavigation;
use Log;
use Auth;

class SliderNavigationObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the SliderNavigation "created" event.
     *
     * @param  \App\Models\Admin\SliderNavigation  $sliderNavigation
     * @return void
     */
    public function created(SliderNavigation $sliderNavigation)
    {
        Log::info($this->logText . 'create a new slider navigation' . $sliderNavigation);
    }

    /**
     * Handle the SliderNavigation "updated" event.
     *
     * @param  \App\Models\Admin\SliderNavigation  $sliderNavigation
     * @return void
     */
    public function updated(SliderNavigation $sliderNavigation)
    {
        Log::info($this->logText . 'update slider navigation' . $sliderNavigation);
    }

    /**
     * Handle the SliderNavigation "deleted" event.
     *
     * @param  \App\Models\Admin\SliderNavigation  $sliderNavigation
     * @return void
     */
    public function deleted(SliderNavigation $sliderNavigation)
    {
        Log::info($this->logText . 'delete slider navigation' . $sliderNavigation);
    }

}
