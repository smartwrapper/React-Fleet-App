<?php

namespace App\Contract\Admin;

interface ShippingMethodInterface
{
    public function all();

    public function show($shipiingMethod);

    public function update(array $parms, $shipiingMethod);

    public function isDefault();

}
