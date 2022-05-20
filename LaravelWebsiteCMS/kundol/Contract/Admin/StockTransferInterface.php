<?php

namespace App\Contract\Admin;

interface StockTransferInterface
{
    public function all();

    public function show($stockTransfer);

    public function store(array $parms);

    public function destroy($stockTransfer);
}
