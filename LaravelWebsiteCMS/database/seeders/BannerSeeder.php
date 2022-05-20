<?php

namespace Database\Seeders;

use App\Models\Admin\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::where('id', '>', '0')->delete();
        Banner::insertOrIgnore(
            [
                'title' => 'Some Title',
                'description' => 'Some Description',
                'slider_navigation_id' => '1',
                'gallary_id' => '2',
                'ref_id' => '1',
                'status' => 'active',
                'language_id' => '1',

            ]
        );

        Banner::insertOrIgnore(
            [
                'title' => 'Some Title',
                'description' => 'Some Description',
                'slider_navigation_id' => '1',
                'gallary_id' => '2',
                'ref_id' => '1',
                'status' => 'active',
                'language_id' => '1',

            ]
        );

        Banner::insertOrIgnore(
            [
                'title' => 'Some Title',
                'description' => 'Some Description',
                'slider_navigation_id' => '2',
                'gallary_id' => '2',
                'ref_id' => '1',
                'status' => 'active',
                'language_id' => '1',

            ]
        );
    }
}
