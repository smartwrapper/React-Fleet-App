<?php

namespace App\Observers;

use App\Models\Admin\SliderType;
use Log;
use Auth;

class SliderTypeObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the SliderType "created" event.
     *
     * @param  \App\Models\Admin\SliderType  $sliderType
     * @return void
     */
    public function created(SliderType $sliderType)
    {
        Log::info($this->logText . 'create a new slider type' . $sliderType);
    }

    /**
     * Handle the SliderType "updated" event.
     *
     * @param  \App\Models\Admin\SliderType  $sliderType
     * @return void
     */
    public function updated(SliderType $sliderType)
    {
        Log::info($this->logText . 'update slider type' . $sliderType);
    }

    /**
     * Handle the SliderType "deleted" event.
     *
     * @param  \App\Models\Admin\SliderType  $sliderType
     * @return void
     */
    public function deleted(SliderType $sliderType)
    {
        Log::info($this->logText . 'delete slider type' . $sliderType);
    }

}
