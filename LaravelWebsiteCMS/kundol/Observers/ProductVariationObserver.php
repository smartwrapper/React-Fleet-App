<?php

namespace App\Observers;

use App\Models\Admin\ProductVariation;
use Log;
use Auth;

class ProductVariationObserver
{

    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductVariation "created" event.
     *
     * @param  \App\Models\Admin\ProductVariation  $productVariation
     * @return void
     */
    public function created(ProductVariation $productVariation)
    {
        Log::info($this->logText . 'create a new product variation' . $productVariation);
    }

    /**
     * Handle the ProductVariation "updated" event.
     *
     * @param  \App\Models\Admin\ProductVariation  $productVariation
     * @return void
     */
    public function updated(ProductVariation $productVariation)
    {
        Log::info($this->logText . 'update product variation' . $productVariation);
    }

    /**
     * Handle the ProductVariation "deleted" event.
     *
     * @param  \App\Models\Admin\ProductVariation  $productVariation
     * @return void
     */
    public function deleted(ProductVariation $productVariation)
    {
        Log::info($this->logText . 'delete product variation' . $productVariation);
    }

}
