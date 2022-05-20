<?php

namespace App\Contract\Admin;

interface SettingInterface
{
    public function all();
    public function update(array $parms, $type);

}
