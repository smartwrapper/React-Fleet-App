<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface CategoryInterface
{
   public function all();

   public function show($category);

   public function store(array $parms);

   public function update(array $parms, $category);

   public function destroy($category);

}