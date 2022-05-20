<?php

namespace Database\Seeders;

use App\Models\Web\CustomerAddressBook;
use Illuminate\Database\Seeder;

class CustomerAddressSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        CustomerAddressBook::where('id', '>', '0')->delete();
        CustomerAddressBook::insertOrIgnore([
            'gender' => 'Male',
            'is_default' => '1',
            'company' => 'Test Company',
            'street_address' => 'Test Address',
            'suburb' => '111',
            'postcode' => '63801',
            'dob' => '1994-05-08',
            'city' => 'Faisalabad',
            'country_id' => '195',
            'state_id' => '130',
            'lattitude' => '102.45',
            'longitude' => '54.10',
            'customer_id' => '1',
        ]);

        CustomerAddressBook::insertOrIgnore([
            'gender' => 'Male',
            'is_default' => '0',
            'company' => 'Test Company 1',
            'street_address' => 'Test Address 1',
            'suburb' => '1111',
            'postcode' => '63801',
            'dob' => '1994-05-09',
            'city' => 'NYC',
            'country_id' => '195',
            'state_id' => '131',
            'lattitude' => '102.45',
            'longitude' => '54.10',
            'customer_id' => '1',
        ]);
        CustomerAddressBook::insertOrIgnore([
            'gender' => 'Male',
            'is_default' => '0',
            'company' => 'Test Company 2',
            'street_address' => 'Test Address 2',
            'suburb' => '1112',
            'postcode' => '63801',
            'dob' => '1994-05-12',
            'city' => 'London',
            'country_id' => '195',
            'state_id' => '130',
            'lattitude' => '102.45',
            'longitude' => '54.10',
            'customer_id' => '1',
        ]);
    }
}
