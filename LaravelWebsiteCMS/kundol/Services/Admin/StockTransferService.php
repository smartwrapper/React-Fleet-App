<?php

namespace App\Services\Admin;

use App\Models\Admin\AvailableQty;
use App\Models\Admin\Inventory;
use App\Models\Admin\StockTransferDetail;
use App\Traits\ApiResponser;
use DB;

class StockTransferService
{
    use ApiResponser;
    public function store($parms, $stockTransferId)
    {
        foreach ($parms['product_id'] as $index => $product_id) {
            if ($parms['qty'][$index] == '' || $parms['qty'][$index] == '0') {
                continue;
            }
            $product_combination_id = null;
            if (isset($parms['product_combination_id'][$index])) {
                $product_combination_id = $parms['product_combination_id'][$index];
            }

            try {
                StockTransferDetail::create([
                    'stock_transfer_id' => $stockTransferId,
                    'product_id' => $product_id,
                    'product_combination_id' => $product_combination_id,
                    'qty' => $parms['qty'][$index],
                ]);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->errorResponse('Stock can not transfer due to internal server error!', 422);
            }

            $sql = $this->inventory($product_id, $parms['warehouse_from'], 'OUT', $stockTransferId, $parms['qty'][$index], $product_combination_id);
            if (!$sql) {
                return 0;
            }
            $sql = $this->inventory($product_id, $parms['warehouse_to'], 'IN', $stockTransferId, $parms['qty'][$index], $product_combination_id);
            if (!$sql) {
                return 0;
            }
        }
        return 1;
    }
    public function StockTransferValidate($parms)
    {
        foreach ($parms['product_id'] as $index => $product_id) {
            if ($parms['qty'][$index] == '' || $parms['qty'][$index] == '0') {
                continue;
            }
            $sql = AvailableQty::productId($product_id)->warehouseId($parms['warehouse_from']);
            if (isset($parms['product_combination_id'][$index]) && $parms['product_combination_id'][$index] != '') {
                $sql = $sql->productCombinationId($parms['product_combination_id'][$index]);
            }
            $sql = $sql->first();
            if (!$sql) {
                return 0;
            }
            if ($parms['qty'][$index] > $sql->remaining) {
                return 0;
            }
        }

        return 1;
    }

    public function inventory($product_id, $warehouseId, $status, $referenceId, $qty, $product_combination_id)
    {
        try {
            $sql = Inventory::create([
                'product_id' => $product_id,
                'warehouse_id' => $warehouseId,
                'customer_id' => null,
                'stock_status' => $status,
                'reference_id' => $referenceId,
                'qty' => $qty,
                'product_combination_id' => $product_combination_id,
                'stock_type' => 'StockTransfer',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return 0;
        }
        return 1;
    }

    public function destroyInventory($stockTransferId)
    {
        try {
            $sql = Inventory::stockTransfer($stockTransferId);
            $sql->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return 0;
        }
        return 1;
    }
}
