<?php

namespace Database\Seeders;

use App\Models\Admin\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        Currency::where('id', '>', '0')->delete();
        Currency::insertOrIgnore(
            [
                'title' => 'USD',
                'code' => '$',
                'is_default' => '1',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
            ]
        );

        // Currency::insertOrIgnore(
        //     [
        //         'title' => 'AED',
        //         'code' => 'AED',
        //         'is_default' => '0',
        //         'exchange_rate' => '3.67',
        //         'decimal_place' => '2',
        //     ]
        // );
    }
}
