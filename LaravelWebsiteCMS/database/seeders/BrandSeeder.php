<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::where('id', '>', '0')->delete();
        Brand::insertOrIgnore([
            'name' => 'brand1',
            'brand_slug' => 'brand1',
            'gallary_id' => '1',
            'status'=>'active'
        ]
        );

        Brand::insertOrIgnore([
            'name' => 'brand2',
            'brand_slug' => 'brand2',
            'gallary_id' => '1',
            'status'=>'active'
        ]
        );
    }
}
