<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface CurrencyInterface
{
   public function all();

   public function show($currency);

   public function store(array $parms);

   public function update(array $parms, $currency);

   public function destroy($currency);

   public function isDefault(array $parms);
}