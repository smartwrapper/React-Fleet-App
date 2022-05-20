<?php

namespace App\Observers;

use App\Models\Admin\ProductCategory;
use Log;
use Auth;

class ProductCategoryObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the ProductCategory "created" event.
     *
     * @param  \App\Models\Admin\ProductCategory  $productCategory
     * @return void
     */
    public function created(ProductCategory $productCategory)
    {
        Log::info($this->logText . 'create a new product category' . $productCategory);
    }

    /**
     * Handle the ProductCategory "updated" event.
     *
     * @param  \App\Models\Admin\ProductCategory  $productCategory
     * @return void
     */
    public function updated(ProductCategory $productCategory)
    {
        Log::info($this->logText . 'update product category' . $productCategory);
    }

    /**
     * Handle the ProductCategory "deleted" event.
     *
     * @param  \App\Models\Admin\ProductCategory  $productCategory
     * @return void
     */
    public function deleted(ProductCategory $productCategory)
    {
        Log::info($this->logText . 'delete product category' . $productCategory);
    }

}
