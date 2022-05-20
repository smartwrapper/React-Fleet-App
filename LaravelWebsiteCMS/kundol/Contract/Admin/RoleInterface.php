<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface RoleInterface
{
   public function all();

   public function show($role);

   public function store(array $parms);

   public function update(array $parms, $role);

   public function destroy($role);

}