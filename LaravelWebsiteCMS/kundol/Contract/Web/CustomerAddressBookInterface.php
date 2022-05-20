<?php

namespace App\Contract\Web;

interface CustomerAddressBookInterface
{
    public function all();

    public function show($customeraddressbook);

    public function store(array $parms);

    public function update(array $parms, $customeraddressbook);

    public function destroy($customeraddressbook);
}
