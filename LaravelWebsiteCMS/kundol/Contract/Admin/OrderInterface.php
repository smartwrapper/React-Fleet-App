<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface OrderInterface
{
   public function all();

   public function show($order);

   public function update(array $parms, $order);
   public function addOrderNotes(array $parms);
   public function addOrderComments(array $parms);
   
   

}