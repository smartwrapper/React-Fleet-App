<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CouponSettingInterface;
use App\Http\Resources\Admin\CouponSetting as CouponSettingResource;
use App\Models\Admin\CouponSetting;
use App\Services\Admin\AccountService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class CouponSettingRepository implements CouponSettingInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $coupon = new CouponSetting;
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $coupon = $coupon->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id', 'code', 'type'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $coupon = $coupon->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }


            return $this->successResponse(CouponSettingResource::collection($coupon->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($couponSetting)
    {
        try {
            return $this->successResponse(new CouponSettingResource($couponSetting), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new CouponSetting;
            $sql = $sql->create($parms);
            // $accounts = new AccountService;
            // $accounts->createAccount('couponcode', $parms['code'], $sql->id);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new CouponSettingResource($sql), 'Coupon Setting Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $couponSetting)
    {
        try {
            $couponSetting->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($couponSetting) {
            return $this->successResponse(new CouponSettingResource($couponSetting), 'Coupon Setting Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($couponSetting)
    {
        try {
            $sql = CouponSetting::findOrFail($couponSetting);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Coupon Setting Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
