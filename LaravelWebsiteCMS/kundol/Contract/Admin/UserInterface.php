<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface UserInterface
{
   public function all();

   public function show($user);

   public function store(array $parms);

   public function update(array $parms, $user);

   public function destroy($user);


}