<?php

namespace App\Contract\Admin;

interface BarCodeSettingInterface
{
    public function all();

    public function show($BarcodeSetting);

    public function store(array $parms);

    public function update(array $parms, $BarcodeSetting);

    public function destroy($BarcodeSetting);
}
