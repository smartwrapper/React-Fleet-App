<?php

namespace App\Contract\Admin;

interface PurchaserInterface
{
    public function all();

    public function show($purchaser);

    public function store(array $parms);

    public function update(array $parms, $purchaser);

    public function destroy($purchaser);

}
