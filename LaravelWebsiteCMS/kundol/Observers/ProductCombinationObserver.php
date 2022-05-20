<?php

namespace App\Observers;

use App\Models\Admin\ProductCombination;
use Log;
use Auth;

class ProductCombinationObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductCombination "created" event.
     *
     * @param  \App\Models\Admin\ProductCombination  $productCombination
     * @return void
     */
    public function created(ProductCombination $productCombination)
    {
        Log::info($this->logText . 'create a new product combination' . $productCombination);
    }

    /**
     * Handle the ProductCombination "updated" event.
     *
     * @param  \App\Models\Admin\ProductCombination  $productCombination
     * @return void
     */
    public function updated(ProductCombination $productCombination)
    {
        Log::info($this->logText . 'update product combination' . $productCombination);
    }

    /**
     * Handle the ProductCombination "deleted" event.
     *
     * @param  \App\Models\Admin\ProductCombination  $productCombination
     * @return void
     */
    public function deleted(ProductCombination $productCombination)
    {
        Log::info($this->logText . 'delete product combination' . $productCombination);
    }

}
