<?php
namespace App\Contract\Admin;

interface TransactionInterface
{
    public function all();
   public function store(array $parms);
   
}
