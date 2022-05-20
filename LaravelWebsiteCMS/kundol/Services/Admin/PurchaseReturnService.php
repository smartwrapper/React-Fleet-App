<?php
namespace App\Services\Admin;

use App\Models\Admin\Inventory;
use App\Traits\ApiResponser;
use Auth;
use DB;

class PurchaseReturnService
{
    use ApiResponser;
    public function storeInventory($product_id, $warehouse_id, $purchaseReturnId, $qty, $product_combination_id)
    {
        try {
            Inventory::create([
                'product_id' => $product_id,
                'warehouse_id' => $warehouse_id,
                'customer_id' => null,
                'stock_status' => 'OUT',
                'reference_id' => $purchaseReturnId,
                'qty' => $qty,
                'product_combination_id' => $product_combination_id,
                'created_by' => Auth::id(),
                'stock_type' => 'PurchaseReturn',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return 0;
        }
        return 1;
    }
}
