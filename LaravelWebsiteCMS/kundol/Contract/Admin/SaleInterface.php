<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface SaleInterface
{
   public function all();

   public function show($sale);

   public function store(array $parms);

   public function destroy($sale);

}