<?php

namespace App\Contract\Admin;

interface WarehouseInterface
{
    public function all();

    public function show($warehouse);

    public function store(array $parms);

    public function update(array $parms, $warehouse);

    public function destroy($warehouse);

}
