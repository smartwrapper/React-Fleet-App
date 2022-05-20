<?php

namespace App\Repository\Web;

use App\Contract\Web\CouponInterface;
use App\Http\Resources\Web\Coupon as CouponResource;
use App\Services\Admin\OrderService;
use App\Traits\ApiResponser;
use Auth;

class CouponRepository implements CouponInterface
{
    use ApiResponser;


    public function store(array $parms)
    {
        try {
            $couponValidate = new OrderService;
            $couponValidate = $couponValidate->CouponCodeValidation($parms['coupon_code'], Auth::id(), \Auth::check());
            if($couponValidate['status'] == 'Error')
                return $couponValidate;
            $sql = $couponValidate['data'];
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new CouponResource($sql), 'Coupon Varified!');
        } else {
            return $this->errorResponse();
        }
    }


}
