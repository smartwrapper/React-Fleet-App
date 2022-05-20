<?php

namespace App\Contract\Web;

interface ReviewInterface
{
    public function all();
    
    public function store(array $parms);

    public function status(array $parms);
}
