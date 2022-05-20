<?php

namespace Database\Seeders;

use App\Models\Admin\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insertOrIgnore(
            [
                'name' => 'demo',
                'created_by' => '1',
            ]
        );
        Tag::insertOrIgnore(
            [
                'name' => 'general',
                'created_by' => '1',
            ]
        );
        Tag::insertOrIgnore(
            [
                'name' => 'sliders',
                'created_by' => '1',
            ]
        );
        Tag::insertOrIgnore(
            [
                'name' => 'banners',
                'created_by' => '1',
            ]
        );
        Tag::insertOrIgnore(
            [
                'name' => 'category',
                'created_by' => '1',
            ]
        );
        Tag::insertOrIgnore(
            [
                'name' => 'product',
                'created_by' => '1',
            ]
        );
        Tag::insertOrIgnore(
            [
                'name' => 'parallax',
                'created_by' => '1',
            ]
        );
    }
}
