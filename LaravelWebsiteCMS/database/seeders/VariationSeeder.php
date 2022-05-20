<?php

namespace Database\Seeders;

use App\Models\Admin\Variation;
use App\Models\Admin\VariationDetail;
use Illuminate\Database\Seeder;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variation::where('id', '>', '0')->delete();

        Variation::insertOrIgnore(
            [
                'attribute_id' => '1',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '1',
                'language_id' => '1',
                'name' => 'Small',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '1',
                'language_id' => '2',
                'name' => 'صغير',
            ]
        );

        Variation::insertOrIgnore(
            [
                'attribute_id' => '1',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '2',
                'language_id' => '1',
                'name' => 'Medium',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '2',
                'language_id' => '2',
                'name' => 'واسطة',
            ]
        );

        Variation::insertOrIgnore(
            [
                'attribute_id' => '1',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '3',
                'language_id' => '1',
                'name' => 'Large',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '3',
                'language_id' => '2',
                'name' => 'كبير',
            ]
        );

        Variation::insertOrIgnore(
            [
                'attribute_id' => '2',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '4',
                'language_id' => '1',
                'name' => 'Red',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '4',
                'language_id' => '2',
                'name' => 'أحمر',
            ]
        );

        Variation::insertOrIgnore(
            [
                'attribute_id' => '2',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '5',
                'language_id' => '1',
                'name' => 'Black',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '5',
                'language_id' => '2',
                'name' => 'أسود',
            ]
        );

        Variation::insertOrIgnore(
            [
                'attribute_id' => '2',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '6',
                'language_id' => '1',
                'name' => 'Blue',
            ]
        );

        VariationDetail::insertOrIgnore(
            [
                'variation_id' => '6',
                'language_id' => '2',
                'name' => 'أزرق',
            ]
        );
    }
}
