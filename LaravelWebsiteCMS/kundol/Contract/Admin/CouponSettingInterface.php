<?php

namespace App\Contract\Admin;

interface CouponSettingInterface
{
    public function all();

    public function show($couponSetting);

    public function store(array $parms);

    public function update(array $parms, $couponSetting);

    public function destroy($couponSetting);

}
