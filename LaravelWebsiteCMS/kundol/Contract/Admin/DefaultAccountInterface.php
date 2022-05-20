<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface DefaultAccountInterface
{
   public function all();

   public function show($account);

   public function store(array $parms);

   public function update(array $parms, $account);

   public function destroy($account);

}