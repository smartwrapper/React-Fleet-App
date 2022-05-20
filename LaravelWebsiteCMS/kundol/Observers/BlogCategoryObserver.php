<?php

namespace App\Observers;

use App\Models\Admin\BlogCategory;
use Log;
use Auth;

class BlogCategoryObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the BlogCategory "created" event.
     *
     * @param  \App\Models\Admin\BlogCategory  $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        Log::info($this->logText . 'create a new blog category' . $blogCategory);
    }

    /**
     * Handle the BlogCategory "updated" event.
     *
     * @param  \App\Models\Admin\BlogCategory  $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        Log::info($this->logText . 'update blog category' . $blogCategory);
    }

    /**
     * Handle the BlogCategory "deleted" event.
     *
     * @param  \App\Models\Admin\BlogCategory  $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        Log::info($this->logText . 'delete blog category' . $blogCategory);
    }


}
