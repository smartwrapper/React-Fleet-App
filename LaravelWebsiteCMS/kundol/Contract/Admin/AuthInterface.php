<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface AuthInterface
{
   public function store(array $parms);

   public function login(array $parms);

   public function logout(array $parms);

   public function getCookieDetails($token);

   public function show();

   public function update(array $parms, $id);

}