<?php

namespace App\Contract\Admin;

interface CustomerInterface
{
    public function all();

    public function show($customer);

    public function store(array $parms);

    public function update(array $parms, $customer);

    public function destroy($customer);

}
