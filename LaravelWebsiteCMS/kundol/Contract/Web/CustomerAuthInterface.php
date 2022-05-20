<?php

namespace App\Contract\Web;

use Illuminate\Support\Collection;

interface CustomerAuthInterface
{
   public function store(array $parms);

   public function forgetPassword(array $parms);

   public function resetPassword(array $parms);

   public function loginWithProvider(array $parms);

   public function login(array $parms);

   public function logout(array $parms);

   public function getCookieDetails($token);

}