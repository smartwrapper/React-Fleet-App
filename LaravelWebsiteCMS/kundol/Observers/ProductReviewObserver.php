<?php

namespace App\Observers;

use App\Models\Admin\ProductReview;
use Log;
use Auth;

class ProductReviewObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductReview "created" event.
     *
     * @param  \App\Models\Admin\ProductReview  $productReview
     * @return void
     */
    public function created(ProductReview $productReview)
    {
        Log::info($this->logText . 'create a new product review' . $productReview);
    }

    /**
     * Handle the ProductReview "updated" event.
     *
     * @param  \App\Models\Admin\ProductReview  $productReview
     * @return void
     */
    public function updated(ProductReview $productReview)
    {
        Log::info($this->logText . 'update product review' . $productReview);
    }

    /**
     * Handle the ProductReview "deleted" event.
     *
     * @param  \App\Models\Admin\ProductReview  $productReview
     * @return void
     */
    public function deleted(ProductReview $productReview)
    {
        Log::info($this->logText . 'delete product review' . $productReview);
    }

}
