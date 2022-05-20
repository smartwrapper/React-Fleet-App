<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface VariationInterface
{
   public function all();

   public function show($variation);

   public function store(array $parms);

   public function update(array $parms, $variation);

   public function destroy($variation);

}