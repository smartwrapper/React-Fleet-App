<?php

namespace App\Contract\Admin;


interface StockInterface
{
   public function all();

   public function show($stock);

   public function store(array $parms);
}
