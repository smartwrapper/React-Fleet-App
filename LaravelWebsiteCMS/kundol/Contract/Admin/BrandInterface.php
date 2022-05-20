<?php

namespace App\Contract\Admin;

interface BrandInterface
{
    public function all();

    public function show($brand);

    public function store(array $parms);

    public function update(array $parms, $brand);

    public function destroy($brand);

}
