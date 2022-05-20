<?php

namespace App\Contract\Web;

interface OrderInterface
{
    public function store(array $parms);
    public function update($order,array $parms);
    public function addOrderComments(array $parms);
    public function getBraintreeAuthToken();
    public function paystackAuthorization(array $parms);

}
