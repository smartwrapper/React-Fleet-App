<?php

namespace Database\Seeders;

use App\Models\Admin\BlogCategoryDetail;
use Illuminate\Database\Seeder;

class BlogCategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategoryDetail::insertOrIgnore(
            [
                'blog_category_id' => '1',
                'language_id' => '1',
                'name' => 'Blog Cat1',
            ]
        );
        BlogCategoryDetail::insertOrIgnore(
            [
                'blog_category_id' => '1',
                'language_id' => '2',
                'name' => 'فئة المدونة 1',
            ]
        );
        BlogCategoryDetail::insertOrIgnore(
            [
                'blog_category_id' => '2',
                'language_id' => '1',
                'name' => 'Blog Cat2',
            ]
        );
        BlogCategoryDetail::insertOrIgnore(
            [
                'blog_category_id' => '2',
                'language_id' => '2',
                'name' => 'فئة المدونة 2',
            ]
        );
    }
}
