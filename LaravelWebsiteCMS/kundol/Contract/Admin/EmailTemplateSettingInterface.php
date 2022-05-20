<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface EmailTemplateSettingInterface
{
   public function all();

   public function show($emailTemplateSetting);

   public function store(array $parms);

   public function update(array $parms, $emailTemplateSetting);

   public function destroy($emailTemplateSetting);

}