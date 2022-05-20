<?php

namespace Database\Seeders;

use App\Models\Admin\Tax;
use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tax::where('id', '>', '0')->delete();
        Tax::insertOrIgnore([
            'title' => 'GST',
            'description' => 'GST',
            'created_by' => 1,
        ]
        );
    }
}
