<?php

namespace App\Observers;

use App\Models\Admin\Tag;
use Auth;
use Log;

class TagObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Tag "created" event.
     *
     * @param  \App\Models\Admin\Tag  $tag
     * @return void
     */
    public function created(Tag $tag)
    {
        $tag->created_by = Auth::id();
        $tag->unsetEventDispatcher();
        $tag->save();
        Log::info($this->logText . ' created a new tag: ' . $tag);
    }

    /**
     * Handle the Tag "updated" event.
     *
     * @param  \App\Models\Admin\Tag  $tag
     * @return void
     */
    public function updated(Tag $tag)
    {
        $tag->updated_by = Auth::id();
        $tag->unsetEventDispatcher();
        $tag->save();
        Log::info($this->logText . ' updated a tag: ' . $tag);
    }

    /**
     * Handle the Tag "deleted" event.
     *
     * @param  \App\Models\Admin\Tag  $tag
     * @return void
     */
    public function deleted(Tag $tag)
    {
        $tag->updated_by = Auth::id();
        $tag->unsetEventDispatcher();
        $tag->save();
        Log::info($this->logText . ' deleted a tag: ' . $tag);
    }
}
