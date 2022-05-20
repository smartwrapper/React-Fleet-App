<?php

namespace App\Contract\Admin;

interface PaymentMethodInterface
{
    public function all();

    public function show($paymentMethod);

    public function update(array $parms, $paymentMethod);

}
