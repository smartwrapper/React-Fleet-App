<?php

namespace App\Observers;

use App\Models\Admin\ProductComment;
use Log;
use Auth;

class ProductCommentObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductComment "created" event.
     *
     * @param  \App\Models\Admin\ProductComment  $productComment
     * @return void
     */
    public function created(ProductComment $productComment)
    {
        Log::info($this->logText . 'create a new product comment' . $productComment);
    }

    /**
     * Handle the ProductComment "updated" event.
     *
     * @param  \App\Models\Admin\ProductComment  $productComment
     * @return void
     */
    public function updated(ProductComment $productComment)
    {
        Log::info($this->logText . 'update product comment' . $productComment);
    }

    /**
     * Handle the ProductComment "deleted" event.
     *
     * @param  \App\Models\Admin\ProductComment  $productComment
     * @return void
     */
    public function deleted(ProductComment $productComment)
    {
        Log::info($this->logText . 'delete product comment' . $productComment);
    }

}
