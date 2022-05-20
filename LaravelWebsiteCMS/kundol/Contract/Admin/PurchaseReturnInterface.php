<?php

namespace App\Contract\Admin;

interface PurchaseReturnInterface
{
    public function all();

    public function show($purchase);

    public function store(array $parms);

    public function destroy($purchase);

}
