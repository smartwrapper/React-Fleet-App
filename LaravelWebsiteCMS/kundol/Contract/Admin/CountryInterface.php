<?php

namespace App\Contract\Admin;

interface CountryInterface
{
    public function all();
    public function show($country);

    public function store(array $parms);

   public function update(array $parms, $country);

   public function destroy($country);

}
