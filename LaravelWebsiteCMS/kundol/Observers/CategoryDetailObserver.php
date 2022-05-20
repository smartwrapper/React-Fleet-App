<?php

namespace App\Observers;

use App\Models\Admin\CategoryDetail;
use Log;
use Auth;

class CategoryDetailObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the CategoryDetail "created" event.
     *
     * @param  \App\Models\Admin\CategoryDetail  $categoryDetail
     * @return void
     */
    public function created(CategoryDetail $categoryDetail)
    {
        Log::info($this->logText . 'create a new category detail' . $categoryDetail);
    }

    /**
     * Handle the CategoryDetail "updated" event.
     *
     * @param  \App\Models\Admin\CategoryDetail  $categoryDetail
     * @return void
     */
    public function updated(CategoryDetail $categoryDetail)
    {
        Log::info($this->logText . 'update category detail' . $categoryDetail);
    }

    /**
     * Handle the CategoryDetail "deleted" event.
     *
     * @param  \App\Models\Admin\CategoryDetail  $categoryDetail
     * @return void
     */
    public function deleted(CategoryDetail $categoryDetail)
    {
        Log::info($this->logText . 'delete category detail' . $categoryDetail);
    }

}
