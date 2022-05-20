<?php

namespace App\Contract\Admin;

interface MembershipInterface
{
    public function all();

    public function store(array $parms);

}
