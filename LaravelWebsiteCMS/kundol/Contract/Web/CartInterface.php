<?php

namespace App\Contract\Web;

interface CartInterface
{
    public function all(array $parms);
    public function store(array $parms);
    public function show($cart);
    public function destroy($cart);
}
