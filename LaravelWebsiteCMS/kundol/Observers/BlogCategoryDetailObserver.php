<?php

namespace App\Observers;

use App\Models\Admin\BlogCategoryDetail;
use Log;
use Auth;

class BlogCategoryDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the BlogCategoryDetail "created" event.
     *
     * @param  \App\Models\Admin\BlogCategoryDetail  $blogCategoryDetail
     * @return void
     */
    public function created(BlogCategoryDetail $blogCategoryDetail)
    {
        Log::info($this->logText . 'create a new blog category detail' . $blogCategoryDetail);
    }

    /**
     * Handle the BlogCategoryDetail "updated" event.
     *
     * @param  \App\Models\Admin\BlogCategoryDetail  $blogCategoryDetail
     * @return void
     */
    public function updated(BlogCategoryDetail $blogCategoryDetail)
    {
        Log::info($this->logText . 'update blog category detail' . $blogCategoryDetail);
    }

    /**
     * Handle the BlogCategoryDetail "deleted" event.
     *
     * @param  \App\Models\Admin\BlogCategoryDetail  $blogCategoryDetail
     * @return void
     */
    public function deleted(BlogCategoryDetail $blogCategoryDetail)
    {
        Log::info($this->logText . 'delete blog category detail' . $blogCategoryDetail);
    }

}
