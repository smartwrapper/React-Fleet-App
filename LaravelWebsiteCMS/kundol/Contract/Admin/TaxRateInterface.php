<?php

namespace App\Contract\Admin;

interface TaxRateInterface
{
    public function all();

    public function show($taxRate);

    public function store(array $parms);

    public function update(array $parms, $taxRate);

    public function destroy($taxRate);

    public function findByState($taxRate);

}
