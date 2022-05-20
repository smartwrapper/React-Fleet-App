<?php

namespace App\Contract\Web;

interface CompareInterface
{
    public function all();
    public function store(array $parms);
    public function show($wishlist);
    public function destroy($brand);

}
