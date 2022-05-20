<?php

namespace App\Observers;

use App\Models\Admin\ProductCombinationDtl;
use Log;
use Auth;

class ProductCombinationDtlObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductCombinationDtl "created" event.
     *
     * @param  \App\Models\Admin\ProductCombinationDtl  $productCombinationDtl
     * @return void
     */
    public function created(ProductCombinationDtl $productCombinationDtl)
    {
        Log::info($this->logText . 'create a new product combination dtl' . $productCombinationDtl);
    }

    /**
     * Handle the ProductCombinationDtl "updated" event.
     *
     * @param  \App\Models\Admin\ProductCombinationDtl  $productCombinationDtl
     * @return void
     */
    public function updated(ProductCombinationDtl $productCombinationDtl)
    {
        Log::info($this->logText . 'update product combination dtl' . $productCombinationDtl);
    }

    /**
     * Handle the ProductCombinationDtl "deleted" event.
     *
     * @param  \App\Models\Admin\ProductCombinationDtl  $productCombinationDtl
     * @return void
     */
    public function deleted(ProductCombinationDtl $productCombinationDtl)
    {
        Log::info($this->logText . 'delete product combination dtl' . $productCombinationDtl);
    }

}
