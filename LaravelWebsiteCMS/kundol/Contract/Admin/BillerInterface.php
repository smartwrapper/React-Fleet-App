<?php

namespace App\Contract\Admin;

interface BillerInterface
{
    public function all();

    public function show($biller);

    public function store(array $parms);

    public function update(array $parms, $biller);

    public function destroy($biller);

}
