<?php

namespace Database\Seeders;

use App\Models\Admin\DefaultAccount;
use Illuminate\Database\Seeder;

class DefaultAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DefaultAccount::where('id', '>', '0')->delete();
        DefaultAccount::insertOrIgnore(
            [
                'id' => '1',
                'account_id' => 8,
                'type' => 'customer',
            ]
        );
        DefaultAccount::insertOrIgnore(
            [
                'id' => '2',
                'account_id' => 11,
                'type' => 'vendor',
                // 'type' => 'supplier',
            ]
        );

        DefaultAccount::insertOrIgnore(
            [
                'id' => '3',
                'account_id' => 17,
                'type' => 'shipping',
            ]
        );

        DefaultAccount::insertOrIgnore(
            [
                'id' => '4',
                'account_id' => 16,
                'type' => 'tax',
            ]
        );

        DefaultAccount::insertOrIgnore(
            [
                'id' => '5',
                'account_id' => 24,
                'type' => 'couponcode',
            ]
        );

        DefaultAccount::insertOrIgnore(
            [
                'id' => '6',
                'account_id' => 23,
                'type' => 'sale',
            ]
        );

        DefaultAccount::insertOrIgnore(
            [
                'id' => '7',
                'account_id' => 25,
                'type' => 'discount',
            ]
        );

        DefaultAccount::insertOrIgnore(
            [
                'id' => '8',
                'account_id' => 2,
                'type' => 'cash',
            ]
        );

    }
}
