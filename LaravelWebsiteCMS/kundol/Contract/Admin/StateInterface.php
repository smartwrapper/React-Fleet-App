<?php

namespace App\Contract\Admin;

interface StateInterface
{
    public function all();

    public function show($state);

}
