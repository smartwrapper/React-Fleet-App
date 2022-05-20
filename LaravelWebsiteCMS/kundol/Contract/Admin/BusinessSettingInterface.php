<?php

namespace App\Contract\Admin;

interface BusinessSettingInterface
{
    public function show($businessSetting);

    public function store(array $parms);

}
