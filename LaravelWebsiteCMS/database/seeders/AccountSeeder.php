<?php

namespace Database\Seeders;

use App\Models\Admin\Account;
use App\Models\Admin\AccountDetail;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::where('id', '>', '0')->delete();
        Account::insertOrIgnore(
            [
                'id' => '1',
                'name' => 'ASSETS',
                'code' => '01',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '0',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '2',
                'name' => 'CASH',
                'code' => '0101',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '1',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '3',
                'name' => 'BANK',
                'code' => '0102',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '1',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '4',
                'name' => 'PAYPAL',
                'code' => '0103',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '1',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '5',
                'name' => 'STRIPE',
                'code' => '0104',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '1',
            ]
        );
        Account::insertOrIgnore(
            [
                'id' => '6',
                'name' => 'SUPPLIES',
                'code' => '0105',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '1',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '7',
                'name' => 'ACCOUNT RECIEVEABLE',
                'code' => '0106',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '1',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '8',
                'name' => 'CUSTOMER',
                'code' => '010601',
                'account_type' => 'Assets',
                'status' => '1',
                'parent_id' => '7',
            ]
        );




        Account::insertOrIgnore(
            [
                'id' => '9',
                'name' => 'LIABILITY',
                'code' => '02',
                'account_type' => 'Liability',
                'status' => '1',
                'parent_id' => '0',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '10',
                'name' => 'ACCOUNT PAYABLE',
                'code' => '0201',
                'account_type' => 'Liability',
                'status' => '1',
                'parent_id' => '9',
            ]
        );

        Account::insertOrIgnore(
            [
                'id' => '11',
                'name' => 'VENDOR',
                'code' => '020101',
                'account_type' => 'Liability',
                'status' => '1',
                'parent_id' => '10',
            ]
        );



        Account::insertOrIgnore(
            [
                'id' => '12',
                'name' => 'EXPENSE',
                'code' => '03',
                'account_type' => 'Expense',
                'status' => '1',
                'parent_id' => '0',
            ]
        );


        Account::insertOrIgnore(
            [
                'id' => '13',
                'name' => 'COST OF PURCHASE',
                'code' => '0301',
                'account_type' => 'Expense',
                'status' => '1',
                'parent_id' => '12',
            ]
        );



       
    }
}
