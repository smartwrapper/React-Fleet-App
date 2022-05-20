<?php

namespace Database\Seeders;

use App\Models\Admin\UserWarehouse;
use Illuminate\Database\Seeder;

class UserWarehouseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $todate = date(NOW());
        UserWarehouse::where('id', '>', '0')->delete();
        UserWarehouse::insertOrIgnore([
            'user_id' => '2',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);
        UserWarehouse::insertOrIgnore([
            'user_id' => '3',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);
        UserWarehouse::insertOrIgnore([
            'user_id' => '4',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);
        UserWarehouse::insertOrIgnore([
            'user_id' => '5',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);
        UserWarehouse::insertOrIgnore([
            'user_id' => '6',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);
        UserWarehouse::insertOrIgnore([
            'user_id' => '7',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);
        UserWarehouse::insertOrIgnore([
            'user_id' => '8',
            'warehouse_id' => '1',
            'created_at' => $todate,
        ]);

    }
}
