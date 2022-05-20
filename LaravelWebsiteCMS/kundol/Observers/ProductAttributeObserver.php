<?php

namespace App\Observers;

use App\Models\Admin\ProductAttribute;
use Log;
use Auth;

class ProductAttributeObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductAttribute "created" event.
     *
     * @param  \App\Models\Admin\ProductAttribute  $productAttribute
     * @return void
     */
    public function created(ProductAttribute $productAttribute)
    {
        Log::info($this->logText . 'create a new product attribute' . $productAttribute);
    }

    /**
     * Handle the ProductAttribute "updated" event.
     *
     * @param  \App\Models\Admin\ProductAttribute  $productAttribute
     * @return void
     */
    public function updated(ProductAttribute $productAttribute)
    {
        Log::info($this->logText . 'update product attribute' . $productAttribute);
    }

    /**
     * Handle the ProductAttribute "deleted" event.
     *
     * @param  \App\Models\Admin\ProductAttribute  $productAttribute
     * @return void
     */
    public function deleted(ProductAttribute $productAttribute)
    {
        Log::info($this->logText . 'delete product attribute' . $productAttribute);
    }

}
