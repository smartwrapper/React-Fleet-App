<?php

namespace App\Observers;

use App\Models\Admin\Slider;
use Log;
use Auth;

class SliderObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Slider "created" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function created(Slider $slider)
    {
        Log::info($this->logText . 'create a new slider' . $slider);
    }

    /**
     * Handle the Slider "updated" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function updated(Slider $slider)
    {
        Log::info($this->logText . 'update slider' . $slider);
    }

    /**
     * Handle the Slider "deleted" event.
     *
     * @param  \App\Models\Admin\Slider  $slider
     * @return void
     */
    public function deleted(Slider $slider)
    {
        Log::info($this->logText . 'delete slider' . $slider);
    }

}
