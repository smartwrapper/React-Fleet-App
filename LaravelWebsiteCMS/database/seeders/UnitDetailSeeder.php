<?php

namespace Database\Seeders;

use App\Models\Admin\UnitDetail;
use Illuminate\Database\Seeder;

class UnitDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitDetail::insertOrIgnore(
            [
                'unit_id' => '1',
                'name' => 'pcs',
                'language_id' => '1',
            ]
        );
        UnitDetail::insertOrIgnore(
            [
                'unit_id' => '1',
                'name' => 'pcs',
                'language_id' => '2',
            ]
        );
    }
}
