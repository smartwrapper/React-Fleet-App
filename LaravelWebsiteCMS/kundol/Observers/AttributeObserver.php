<?php

namespace App\Observers;

use App\Models\Admin\Attribute;
use Auth;
use Log;

class AttributeObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Attribute "created" event.
     *
     * @param  \App\Models\Admin\Attribute  $attribute
     * @return void
     */
    public function created(Attribute $attribute)
    {
        $attribute->created_by = Auth::id();
        $attribute->unsetEventDispatcher();
        $attribute->save();
        Log::info($this->logText . ' created a new attrinute: ' . $attribute);
    }

    /**
     * Handle the Attribute "updated" event.
     *
     * @param  \App\Models\Admin\Attribute  $attribute
     * @return void
     */
    public function updated(Attribute $attribute)
    {
        $attribute->updated_by = Auth::id();
        $attribute->unsetEventDispatcher();
        $attribute->save();
        Log::info($this->logText . ' updated an attrinute: ' . $attribute);
    }

    /**
     * Handle the Attribute "deleted" event.
     *
     * @param  \App\Models\Admin\Attribute  $attribute
     * @return void
     */
    public function deleted(Attribute $attribute)
    {
        $attribute->updated_by = Auth::id();
        $attribute->unsetEventDispatcher();
        $attribute->save();
        Log::info($this->logText . ' deleted an attrinute: ' . $attribute);
    }
}
