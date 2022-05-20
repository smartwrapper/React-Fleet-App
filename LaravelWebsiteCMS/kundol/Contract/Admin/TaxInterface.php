<?php

namespace App\Contract\Admin;

interface TaxInterface
{
    public function all();

    public function show($tax);

    public function store(array $parms);

    public function update(array $parms, $tax);

    public function destroy($tax);

}
