<?php

namespace App\Contract\Admin;

interface QuotationInterface
{
    public function all();

    public function show($quotation);

    public function store(array $parms);

    public function update(array $parms, $quotation);

    public function destroy($quotation);

}
