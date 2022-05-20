<?php

namespace Database\Seeders;

use App\Models\Admin\SliderNavigation;
use Illuminate\Database\Seeder;

class SliderNavigationSeeder extends Seeder
{
    public function run()
    {

        SliderNavigation::where('id', '>', '0')->delete();
        SliderNavigation::insertOrIgnore([
            ['name' => 'Category'],
            ['name' => 'Product'],
            ['name' => 'Page'],
            ['name' => 'Link'],
        ]);
    }
}
