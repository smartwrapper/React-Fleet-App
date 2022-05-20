<?php

namespace App\Observers;

use App\Models\BlogNews;
use Log;
use Auth;

class BlogNewsObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the BlogNews "created" event.
     *
     * @param  \App\Models\BlogNews  $blogNews
     * @return void
     */
    public function created(BlogNews $blogNews)
    {
        Log::info($this->logText . 'create a new blog' . $blogNews);
    }

    /**
     * Handle the BlogNews "updated" event.
     *
     * @param  \App\Models\BlogNews  $blogNews
     * @return void
     */
    public function updated(BlogNews $blogNews)
    {
        Log::info($this->logText . 'update blog' . $blogNews);
    }

    /**
     * Handle the BlogNews "deleted" event.
     *
     * @param  \App\Models\BlogNews  $blogNews
     * @return void
     */
    public function deleted(BlogNews $blogNews)
    {
        Log::info($this->logText . 'delete blog' . $blogNews);
    }

}
