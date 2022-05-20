<?php

namespace App\Contract\Admin;

interface GallaryInterface
{
    public function all();

    public function show($gallary);

    public function store($parms);

    public function destroy($gallary);

    public function resizeSingleImage($gallary);

}
