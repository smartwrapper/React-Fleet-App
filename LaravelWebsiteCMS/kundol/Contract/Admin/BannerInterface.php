<?php

namespace App\Contract\Admin;

interface BannerInterface
{
    public function all();

    public function show($banner);

    public function store(array $parms);

    public function update(array $parms, $banner);

    public function destroy($banner);

}
