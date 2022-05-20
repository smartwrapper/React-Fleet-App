<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface UnitInterface
{
   public function all();

   public function show($unit);

   public function store(array $parms);

   public function update(array $parms, $unit);

   public function destroy($unit);

}