<?php

namespace App\Contract\Web;

interface CustomerInterface
{
    public function show($customer);
    public function update(array $parms, $customer);

}
