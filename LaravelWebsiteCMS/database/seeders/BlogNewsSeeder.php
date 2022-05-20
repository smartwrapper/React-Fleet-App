<?php

namespace Database\Seeders;

use App\Models\Admin\BlogNews;
use Illuminate\Database\Seeder;

class BlogNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todate = date(NOW());
        BlogNews::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_id' => '1',
                'status' => 'active',
                'is_featured' => '1',
                'slug' => 'blog_cat1_title1',
                'created_by' => '1',
                'created_at' => $todate,
            ]
        );
        BlogNews::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_id' => '1',
                'status' => 'active',
                'is_featured' => '1',
                'slug' => 'blog_cat1_title2',
                'created_by' => '1',
                'created_at' => $todate,
            ]
        );
        BlogNews::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_id' => '1',
                'status' => 'active',
                'is_featured' => '1',
                'slug' => 'blog_cat1_title3',
                'created_by' => '1',
                'created_at' => $todate,
            ]
        );
        BlogNews::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_id' => '2',
                'status' => 'active',
                'is_featured' => '1',
                'slug' => 'blog_cat2_title1',
                'created_by' => '1',
                'created_at' => $todate,
            ]
        );
        BlogNews::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_id' => '2',
                'status' => 'active',
                'is_featured' => '1',
                'slug' => 'blog_cat2_title2',
                'created_by' => '1',
                'created_at' => $todate,
            ]
        );
        BlogNews::insertOrIgnore(
            [
                'gallary_id' => '32',
                'blog_category_id' => '2',
                'status' => 'active',
                'is_featured' => '1',
                'slug' => 'blog_cat2_title3',
                'created_by' => '1',
                'created_at' => $todate,
            ]
        );
    }
}
