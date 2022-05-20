<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface LanguageInterface
{
   public function all();

   public function show($language);

   public function store(array $parms);

   public function update(array $parms, $language);

   public function destroy($language);
}
