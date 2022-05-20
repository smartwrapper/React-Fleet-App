<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\CategoryDetail;

class CategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryDetail::where('id', '>', '0')->delete();
        CategoryDetail::insertOrIgnore([
            'category_name' => 'Cat1',
            'description' => 'Cat1 Description Goes Here',
            'category_id' => '1',
            'language_id' => '1'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'الالكترونيات',
            'description' => 'يتم وضع وصف Cat1 هنا',
            'category_id' => '1',
            'language_id' => '2'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'Cat2',
            'description' => 'Cat2 Description Goes Here',
            'category_id' => '2',
            'language_id' => '1'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'الملابس',
            'description' => 'الفئة 2 الوصف يذهب هنا',
            'category_id' => '2',
            'language_id' => '2'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'Sub Cat1',
            'description' => 'Sub Cat1 Description Goes Here',
            'category_id' => '3',
            'language_id' => '1'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'تصنيف فرعي',
            'description' => 'الفئة الفرعية 1 الوصف يذهب هنا',
            'category_id' => '3',
            'language_id' => '2'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'Sub Cat2',
            'description' => 'Sub Cat2 Description Goes Here',
            'category_id' => '4',
            'language_id' => '1'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'الفئة الفرعية 2',
            'description' => 'الفئة الفرعية 2 الوصف يذهب هنا',
            'category_id' => '4',
            'language_id' => '2'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'Sub Cat3',
            'description' => 'Sub Cat3 Description Goes Here',
            'category_id' => '5',
            'language_id' => '1'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'الفئة الفرعية 3',
            'description' => 'الفئة الفرعية 3 الوصف يذهب هنا',
            'category_id' => '5',
            'language_id' => '2'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'Sub Cat4',
            'description' => 'Sub Cat4 Description Goes Here',
            'category_id' => '6',
            'language_id' => '1'
        ]
        );

        CategoryDetail::insertOrIgnore([
            'category_name' => 'الفئة الفرعية 4',
            'description' => 'الفئة الفرعية 4 الوصف يذهب هنا',
            'category_id' => '6',
            'language_id' => '2'
        ]
        );
    }
}