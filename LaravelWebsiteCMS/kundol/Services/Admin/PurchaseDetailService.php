<?php
namespace App\Services\Admin;

use App\Models\Admin\Inventory;
use App\Models\Admin\PurchaseDetail;
use App\Traits\ApiResponser;
use DB;

class PurchaseDetailService
{
    use ApiResponser;
    public function store($parms, $purchaseId, $warehouseId)
    {
        foreach ($parms['product_id'] as $index => $product_id) {
            if (!isset($parms['qty'][$index]) || !isset($parms['price'][$index]) || $parms['qty'][$index] == '' || $parms['price'][$index] == '' || $parms['qty'][$index] == 0) {
                continue;
            }
            $product_combination_id = null;
            if (isset($parms['product_combination_id'][$index])) {
                $product_combination_id = $parms['product_combination_id'][$index];
            }

            try {
                PurchaseDetail::create([
                    'purchase_id' => $purchaseId,
                    'product_id' => $product_id,
                    'product_combination_id' => $product_combination_id,
                    'price' => $parms['price'][$index],
                    'qty' => $parms['qty'][$index],
                    'product_total' => $parms['price'][$index] * $parms['qty'][$index],
                ]);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->errorResponse('Purchase can not saved due to internal server error!', 422);
            }

            try {
                Inventory::create([
                    'product_id' => $product_id,
                    'warehouse_id' => $warehouseId,
                    'customer_id' => null,
                    'stock_status' => 'IN',
                    'reference_id' => $purchaseId,
                    'qty' => $parms['qty'][$index],
                    'product_combination_id' => $product_combination_id,
                    'stock_type' => 'Purchase',
                ]);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->errorResponse('Purchase can not saved due to internal server error!', 422);
            }

        }
        return 1;
    }
    public function purchaseDetailValidate($parms)
    {
        $message = '';
        if (!isset($parms['product_combination_id'])) {
            $message = 'product_combination_id is required.';
        }
        if ($message == '' && !is_array($parms['product_combination_id'])) {
            $message = 'product_combination_id must be in array.';
        }
        if ($message == '' && count($parms['product_id']) != count($parms['product_combination_id'])) {
            $message = 'product_combination_id is required.';
        }

        if ($message != '') {
            return $this->errorResponse($message, 401);
        }

        foreach ($parms['product_id'] as $i => $saleDetail) {
            
            if (!isset($parms['product_id'][$i])) {
                if(isset($parms['product_name'][$i])){
                    $message = $parms['product_name'][$i].' product_id is required.';
                }
                else{
                    $message = 'product_id index ' . $i . ' is required.';
                }
            }
            if (isset($parms['qty'][$i]) && !isset($parms['price'][$i])) {
                if(isset($parms['product_name'][$i])){
                    $message = $parms['product_name'][$i] .' Price is required';
                }
                else{
                    $message = 'price index ' . $i . ' is required.';
                }
            }
            if (!isset($parms['product_total'][$i])) {
                if(isset($parms['product_name'][$i])){
                    $message = $parms['product_name'][$i].' total is required.';
                }
                else{
                    $message = 'product_total index ' . $i . ' is required.';
                }
            }
            if ($message != '') {
                return $this->errorResponse($message, 401);
            }
            // $availableQty = new AvailableQty;
            // $availableQty = $availableQty->availableQty($saleDetail, $parms['product_combination_id'][$i], $parms['qty'][$i]);
            // if(!$availableQty){
            //     return $this->errorResponse('Out of Stock with Qty index ' . $i . '', 422);
            // }
        }
        

        if ($message != '') {
            return $this->errorResponse($message, 401);
        }

        return 1;

        return 1;
    }
}
