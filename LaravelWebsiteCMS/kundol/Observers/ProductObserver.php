<?php

namespace App\Observers;

use App\Models\Admin\Product;
use Log;
use Auth;

class ProductObserver
{

    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        Log::info($this->logText . 'create a new product' . $product);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        Log::info($this->logText . 'update product' . $product);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        Log::info($this->logText . 'delete product' . $product);
    }

}
