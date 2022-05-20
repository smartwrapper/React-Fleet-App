<?php

namespace App\Observers;

use App\Models\Admin\ProductDetail;
use Log;
use Auth;

class ProductDetailObserver
{

    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductDetail "created" event.
     *
     * @param  \App\Models\Admin\ProductDetail  $productDetail
     * @return void
     */
    public function created(ProductDetail $productDetail)
    {
        Log::info($this->logText . 'create a new product detail' . $productDetail);
    }

    /**
     * Handle the ProductDetail "updated" event.
     *
     * @param  \App\Models\Admin\ProductDetail  $productDetail
     * @return void
     */
    public function updated(ProductDetail $productDetail)
    {
        Log::info($this->logText . 'update product detail' . $productDetail);
    }

    /**
     * Handle the ProductDetail "deleted" event.
     *
     * @param  \App\Models\Admin\ProductDetail  $productDetail
     * @return void
     */
    public function deleted(ProductDetail $productDetail)
    {
        Log::info($this->logText . 'delete product detail' . $productDetail);
    }

}
