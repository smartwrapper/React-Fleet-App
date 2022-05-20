<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::where('id', '>', '0')->delete();
        Category::insertOrIgnore([
            'gallary_id' => '32',
            'category_icon' => '33',
            'category_slug' => 'cat1'
        ]
        );

        Category::insertOrIgnore([
            'gallary_id' => '32',
            'category_icon' => '33',
            'category_slug' => 'cat2'
        ]
        );
        
        Category::insertOrIgnore([
            'gallary_id' => '32',
            'category_icon' => '33',
            'parent_id' => '1',
            'category_slug' => 'sub_cat1'
        ]
        );

        Category::insertOrIgnore([
            'gallary_id' => '32',
            'category_icon' => '33',
            'parent_id' => '1',
            'category_slug' => 'sub_cat2'
        ]
        );

        Category::insertOrIgnore([
            'gallary_id' => '32',
            'category_icon' => '33',
            'parent_id' => '2',
            'category_slug' => 'sub_cat3'
        ]
        );

        Category::insertOrIgnore([
            'gallary_id' => '32',
            'category_icon' => '33',
            'parent_id' => '3',
            'category_slug' => 'sub_cat4'
        ]
        );
    }
}