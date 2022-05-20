<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface SaleReturnInterface
{
   public function all();

   public function show($saleReturn);

   public function store(array $parms);

   public function destroy($saleReturn);

}