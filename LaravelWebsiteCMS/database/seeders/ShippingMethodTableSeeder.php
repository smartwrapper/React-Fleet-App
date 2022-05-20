<?php

namespace Database\Seeders;

use App\Models\Admin\ShippingMethod;
use App\Models\Admin\ShippingMethodDescription;
use Illuminate\Database\Seeder;

class ShippingMethodTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        ShippingMethod::where('id', '>', '0')->delete();

        ShippingMethod::insertOrIgnore([
            [
                'methods_type_link' => 'shippingByWeight',
                'is_default' => 1,
                'amount' => 0,
                'status' => 1,
            ],
            [
                'methods_type_link' => 'localPickup',
                'is_default' => 0,
                'amount' => 0,
                'status' => 1,
            ],
            [
                'methods_type_link' => 'freeShipping',
                'is_default' => 0,
                'amount' => 0,
                'status' => 1,
            ],
            [
                'methods_type_link' => 'flateRate',
                'is_default' => 0,
                'amount' => 0,
                'status' => 1,
            ],
        ]);

        ShippingMethodDescription::where('id', '>', '0')->delete();

        ShippingMethodDescription::insertOrIgnore([
            [
                'name' => 'shippingByWeight',
                'language_id' => 1,
                'shipping_method_id' => 1,
            ],
            [
                'name' => 'localPickup',
                'language_id' => 1,
                'shipping_method_id' => 2,
            ],
            [
                'name' => 'freeShipping',
                'language_id' => 1,
                'shipping_method_id' => 3,
            ],
            [
                'name' => 'flateRate',
                'language_id' => 1,
                'shipping_method_id' => 4,
            ],
        ]);

        ShippingMethodDescription::insertOrIgnore([
            [
                'name' => 'shippingByWeight',
                'language_id' => 2,
                'shipping_method_id' => 1,
            ],
            [
                'name' => 'localPickup',
                'language_id' => 2,
                'shipping_method_id' => 2,
            ],
            [
                'name' => 'freeShipping',
                'language_id' => 2,
                'shipping_method_id' => 3,
            ],
            [
                'name' => 'flateRate',
                'language_id' => 2,
                'shipping_method_id' => 4,
            ],
        ]);
    }
}
