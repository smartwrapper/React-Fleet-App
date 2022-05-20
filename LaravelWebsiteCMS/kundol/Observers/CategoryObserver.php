<?php

namespace App\Observers;

use App\Models\Admin\Category;
use Log;
use Auth;

class CategoryObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        Log::info($this->logText . 'create a new category' . $category);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        Log::info($this->logText . 'update category' . $category);
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        Log::info($this->logText . 'delete category' . $category);
    }

}
