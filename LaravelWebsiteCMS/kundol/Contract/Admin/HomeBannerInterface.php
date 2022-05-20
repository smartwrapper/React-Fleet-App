<?php

namespace App\Contract\Admin;

interface HomeBannerInterface
{
    public function all();

    public function show($banner);

    public function store(array $parms);

    public function update(array $parms, $banner);

    public function destroy($banner);

}
