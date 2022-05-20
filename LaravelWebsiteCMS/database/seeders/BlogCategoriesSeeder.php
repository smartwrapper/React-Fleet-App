<?php

namespace Database\Seeders;

use App\Models\Admin\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_slug' => 'blogcat1',
                'status' => 'active',
                'created_by' => '1',
            ]
        );
        BlogCategory::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_slug' => 'blogcat2',
                'status' => 'active',
                'created_by' => '1',
            ]
        );
    }
}
