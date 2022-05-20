<?php

namespace App\Contract\Admin;

interface TimezoneInterface
{
    public function all();

    public function show($timezone);

    public function store(array $parms);

    public function update(array $parms, $timezone);

    public function destroy($timezone);

}
