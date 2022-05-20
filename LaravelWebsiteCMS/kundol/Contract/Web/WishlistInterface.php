<?php

namespace App\Contract\Web;

interface WishlistInterface
{
    public function all();
    public function store(array $parms);
    public function show($wishlist);
    public function destroy($brand);

}
