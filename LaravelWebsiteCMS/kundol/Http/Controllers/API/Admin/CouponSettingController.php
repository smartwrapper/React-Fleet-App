<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CouponSettingInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CouponSettingRequest;
use App\Models\Admin\CouponSetting;
use App\Repository\Admin\CouponSettingRepository;

class CouponSettingController extends Controller
{
    private $CouponSettingRepository;

    public function __construct(CouponSettingInterface $CouponSettingRepository)
    {
        $this->CouponSettingRepository = $CouponSettingRepository;
    }

    public function index()
    {
        return $this->CouponSettingRepository->all();
    }

    public function show(CouponSetting $couponSetting)
    {
        return $this->CouponSettingRepository->show($couponSetting);
    }

    public function store(CouponSettingRequest $request)
    {
        $parms = $request->all();
        return $this->CouponSettingRepository->store($parms);
    }

    public function update(CouponSettingRequest $request, CouponSetting $couponSetting)
    {
        $parms = $request->all();
        return $this->CouponSettingRepository->update($parms, $couponSetting);
    }

    public function destroy($id)
    {
        return $this->CouponSettingRepository->destroy($id);
    }

}
