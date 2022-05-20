<?php

namespace App\Observers;

use App\Models\BlogNewsDetail;
use Log;
use Auth;

class BlogNewsDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the BlogNewsDetail "created" event.
     *
     * @param  \App\Models\BlogNewsDetail  $blogNewsDetail
     * @return void
     */
    public function created(BlogNewsDetail $blogNewsDetail)
    {
        Log::info($this->logText . 'create a new blog detail' . $blogNewsDetail);
    }

    /**
     * Handle the BlogNewsDetail "updated" event.
     *
     * @param  \App\Models\BlogNewsDetail  $blogNewsDetail
     * @return void
     */
    public function updated(BlogNewsDetail $blogNewsDetail)
    {
        Log::info($this->logText . 'update blog detail' . $blogNewsDetail);
    }

    /**
     * Handle the BlogNewsDetail "deleted" event.
     *
     * @param  \App\Models\BlogNewsDetail  $blogNewsDetail
     * @return void
     */
    public function deleted(BlogNewsDetail $blogNewsDetail)
    {
        Log::info($this->logText . 'delete blog detail' . $blogNewsDetail);
    }

}
