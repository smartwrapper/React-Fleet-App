<?php

namespace App\Services\Admin;

use App\Models\Admin\AvailableQty as AvailableInventory;
use App\Models\Admin\PurchaseDetail;
use App\Models\Admin\PurchaseReturnDetail;
use App\Models\Admin\SaleDetail;
use App\Models\Admin\SaleReturnDetail;
use App\Models\Admin\Warehouse;

class AvailableQty
{
    public function availableQty($product_id, $product_combination_id, $qty, $type = null)
    {

        $availableQty = AvailableInventory::where('product_id', $product_id);
        if ($product_combination_id != '') {
            $availableQty = $availableQty->where('product_combination_id', $product_combination_id);
        }
        if($type == 'cart'){
            $defaultWareHouse =  Warehouse::isDefault()->value('id');
            $availableQty = $availableQty->where('warehouse_id',$defaultWareHouse);

        }
        $availableQty = $availableQty->first();
        if (!$availableQty) {
            return 0;
        }
        $returnQty = $availableQty->remaining;
        if ($type == 'purchase_return') {
            $returnQty = PurchaseReturnDetail::stockCheck($product_id, $product_combination_id)->sum('qty');
            $returnQty = $availableQty->remaining + $returnQty;
        }
        if ($qty <= $returnQty) {
            return 1;
        } else {
            return 0;
        }
    }

    public function availableQtyPurchase($product_id, $product_combination_id, $qty, $purchase_id)
    {
        if($qty == '0'){
            return 0;
        }
        $availableQty = PurchaseDetail::where('product_id', $product_id)->where('purchase_id', $purchase_id);
        if ($product_combination_id != '') {
            $availableQty = $availableQty->where('product_combination_id', $product_combination_id);
        }
        $availableQty = $availableQty->sum('qty');
        if ($availableQty == '0') {
            return 0;
        }

        $returnQty = PurchaseReturnDetail::stockCheck($product_id, $product_combination_id, $purchase_id)->sum('qty');
        $aval_stc = $availableQty - $returnQty;
        if ($qty > $aval_stc) {
            return 0;
        } else {
            return 1;
        }
    }

    public function availableQtySale($product_id, $product_combination_id, $qty, $sale_id)
    {
        if($qty == '0'){
            return 0;
        }
        $availableQty = SaleDetail::where('product_id', $product_id)->where('sale_id', $sale_id);
        if ($product_combination_id != '') {
            $availableQty = $availableQty->where('product_combination_id', $product_combination_id);
        }
        $availableQty = $availableQty->sum('qty');
        if ($availableQty == '0') {
            return 0;
        }

        $returnQty = SaleReturnDetail::stockCheck($product_id, $product_combination_id, $sale_id)->sum('qty');
        $aval_stc = $availableQty - $returnQty;
        if ($qty > $aval_stc) {
            return 0;
        } else {
            return 1;
        }
    }
}
