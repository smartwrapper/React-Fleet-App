<?php

namespace Database\Seeders;

use App\Models\Admin\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        Language::where('id', '>', '0')->delete();
        Language::insertOrIgnore(
            [
                'name' => 'English',
                'code' => 'EN',
                'direction' => "ltr",
                'is_default' => '1',
            ]
        );

        // Language::insertOrIgnore(
        //     [
        //         'name' => 'Arabic',
        //         'code' => 'AR',
        //         'direction' => "rtl",
        //         'is_default' => '0',
        //     ]
        // );
    }
}
