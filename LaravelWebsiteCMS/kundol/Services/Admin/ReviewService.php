<?php

namespace App\Services\Admin;

use App\Traits\ApiResponser;
use App\Models\Web\Order;
use App\Models\Web\Review;
use Auth;

class ReviewService
{
    use ApiResponser;
    public function reviewServiceValidation($parms)
    {
        $product_id = $parms['product_id'];

        $sql = Order::where('customer_id',\Auth::id())->whereHas('detail', function($q) use ($product_id){
            $q->where('order_detail.product_id',$product_id);
        })->first();

        if($sql){
            $review_check = Review::where('customer_id', \Auth::id())->where('product_id', $product_id)->count();
            if($review_check == 0){
                return 1;
            }
            return 0;
        }
        return 0;
    }

}
