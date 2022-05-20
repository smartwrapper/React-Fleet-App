<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Log;

class AvailableQty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:available_qty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or replace quantity view.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        \Artisan::call('config:cache');

        Log::info('command running ......');
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement("CREATE OR REPLACE VIEW coupon_order AS SELECT customer_id, coupon_code, count(coupon_code) as num_of_usage FROM `orders` Group By customer_id, coupon_code");

            // DB::statement("CREATE OR REPLACE VIEW top_selling_products AS SELECT SUM(qty) as qty,product_id , product_combination_id from (SELECT orders.id as order_id,order_detail.product_id,order_detail.product_combination_id,order_detail.qty FROM orders LEFT JOIN order_detail ON order_detail.order_id = orders.id) a GROUP by product_id,product_combination_id");
            DB::statement("CREATE OR REPLACE VIEW top_selling_products AS SELECT SUM(qty) as qty,product_id  from (SELECT orders.id as order_id,order_detail.product_id,order_detail.qty FROM orders LEFT JOIN order_detail ON order_detail.order_id = orders.id) a GROUP by product_id");
            DB::statement("CREATE OR REPLACE VIEW customer_order_amount AS select `orders`.`customer_id` AS `customer_id`,sum(`orders`.`order_price`) AS `order_amount` from `orders` group by `orders`.`customer_id`");

            Log::info('command run successfully mysql');
            DB::statement("CREATE OR REPLACE VIEW avaliable_qty AS select inventory.product_id,inventory.product_combination_id, inventory.warehouse_id, (SELECT sum(qty) from inventory as s_in WHERE stock_status = 'IN' and inventory.warehouse_id = s_in.warehouse_id and inventory.product_id = s_in.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_in.product_combination_id else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id) as stock_in, (SELECT sum(qty) from inventory as s_out WHERE stock_status = 'OUT' and inventory.warehouse_id = s_out.warehouse_id and inventory.product_id = s_out.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_out.product_combination_id  else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id) as stock_out, (SELECT sum(qty) from inventory as s_in WHERE stock_status = 'IN' and inventory.warehouse_id = s_in.warehouse_id and inventory.product_id = s_in.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_in.product_combination_id else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id)- IFNULL((SELECT sum(qty) from inventory as s_out WHERE stock_status = 'OUT' and inventory.warehouse_id = s_out.warehouse_id and inventory.product_id = s_out.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_out.product_combination_id else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id), 0) as remaining, products.product_type, IF(product_type = 'simple' or product_type = 'digital', products.price,p_combination.price) as price, IF(product_type = 'simple' or product_type = 'digital', products.discount_price,'0') as discount_price from inventory LEFT join products on products.id = inventory.product_id LEFT join product_combination as p_combination on p_combination.id = inventory.product_combination_id
            GROUP BY inventory.warehouse_id, inventory.product_id,inventory.product_combination_id");
        } else if (env('DB_CONNECTION') == 'pgsql') {
            DB::statement("CREATE OR REPLACE VIEW coupon_order AS SELECT customer_id, coupon_code, count(coupon_code) as num_of_usage FROM `orders` Group By customer_id, coupon_code");

            Log::info('command run successfully pgsql');
            DB::statement("CREATE OR REPLACE VIEW AVALIABLE_QTY AS SELECT PRODUCT_ID, PRODUCT_COMBINATION_ID, WAREHOUSE_ID, (SELECT SUM(QTY) FROM INVENTORY AS S_IN WHERE STOCK_STATUS = 'IN' AND INVENTORY.WAREHOUSE_ID = S_IN.WAREHOUSE_ID AND INVENTORY.PRODUCT_ID = S_IN.PRODUCT_ID AND CASE WHEN INVENTORY.PRODUCT_COMBINATION_ID IS NOT NULL THEN INVENTORY.PRODUCT_COMBINATION_ID = S_IN.PRODUCT_COMBINATION_ID ELSE INVENTORY.PRODUCT_ID > 0 END GROUP BY WAREHOUSE_ID, PRODUCT_ID, PRODUCT_COMBINATION_ID) AS STOCK_IN, (SELECT SUM(QTY) FROM INVENTORY AS S_OUT WHERE STOCK_STATUS = 'OUT' AND INVENTORY.WAREHOUSE_ID = S_OUT.WAREHOUSE_ID AND INVENTORY.PRODUCT_ID = S_OUT.PRODUCT_ID AND CASE WHEN INVENTORY.PRODUCT_COMBINATION_ID IS NOT NULL THEN INVENTORY.PRODUCT_COMBINATION_ID = S_OUT.PRODUCT_COMBINATION_ID ELSE INVENTORY.PRODUCT_ID > 0 END GROUP BY WAREHOUSE_ID, PRODUCT_ID, PRODUCT_COMBINATION_ID) AS STOCK_OUT, (SELECT SUM(QTY) FROM INVENTORY AS S_IN WHERE STOCK_STATUS = 'IN' AND INVENTORY.WAREHOUSE_ID = S_IN.WAREHOUSE_ID AND INVENTORY.PRODUCT_ID = S_IN.PRODUCT_ID AND CASE WHEN INVENTORY.PRODUCT_COMBINATION_ID IS NOT NULL THEN INVENTORY.PRODUCT_COMBINATION_ID = S_IN.PRODUCT_COMBINATION_ID ELSE INVENTORY.PRODUCT_ID > 0 END GROUP BY WAREHOUSE_ID, PRODUCT_ID, PRODUCT_COMBINATION_ID) - NULLIF( (SELECT SUM(QTY) FROM INVENTORY AS S_OUT WHERE STOCK_STATUS = 'OUT' AND INVENTORY.WAREHOUSE_ID = S_OUT.WAREHOUSE_ID AND INVENTORY.PRODUCT_ID = S_OUT.PRODUCT_ID AND CASE WHEN INVENTORY.PRODUCT_COMBINATION_ID IS NOT NULL THEN INVENTORY.PRODUCT_COMBINATION_ID = S_OUT.PRODUCT_COMBINATION_ID ELSE INVENTORY.PRODUCT_ID > 0 END GROUP BY WAREHOUSE_ID, PRODUCT_ID, PRODUCT_COMBINATION_ID), 0) AS REMAINING FROM INVENTORY GROUP BY WAREHOUSE_ID, PRODUCT_ID, PRODUCT_COMBINATION_ID");
        }
    }
}
