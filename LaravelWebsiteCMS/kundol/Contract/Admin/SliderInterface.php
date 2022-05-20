<?php

namespace App\Contract\Admin;

interface SliderInterface
{
    public function all();

    public function show($slider);

    public function store(array $parms);

    public function update(array $parms, $slider);

    public function destroy($slider);

}
