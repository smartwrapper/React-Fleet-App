<?php

namespace App\Repository\Admin;

use App\Contract\Admin\AvailableQtyInterface;
use App\Http\Resources\Admin\AvailableQty as AvailableQtyResource;
use App\Models\Admin\AvailableQty;
use App\Models\Admin\AvailableQtyDetail;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class AvailableQtyRepository implements AvailableQtyInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all($params)
    {
        try {
            $AvailableQty = array();
            $warehouse = isset($params['warehouse_id']) ? $params['warehouse_id'] : 1;
            if (isset($params['product_type']) && $params['product_type'] == 'simple') {
                if (isset($params['product_id'])) {
                    $AvailableQtyCount = AvailableQty::where('product_id', $params['product_id'])->where('warehouse_id', $warehouse)->count();
                    if ($AvailableQtyCount > 0) {
                        $AvailableQty = AvailableQty::where('product_id', $params['product_id'])->where('warehouse_id', $warehouse)->firstOrFail();
                    } else {
                        $AvailableQty = (object)[
                            "product_id" => $params['product_id'],
                            "product_combination_id" => null,
                            "product_type" => $params['product_type'],
                            "warehouse_id" => $warehouse,
                            "stock_in" => "0",
                            "stock_out" => "0",
                            "remaining" => "0",
                            "price" => 0,
                            "discount_price" => null
                        ];
                    }
                }
            }
            if (isset($params['product_type']) && $params['product_type'] == 'variable') {
                if (isset($params['product_combination_id']) && isset($params['product_id'])) {
                    $AvailableQtyCount = AvailableQty::where('product_id', $params['product_id'])->where('product_combination_id', $params['product_combination_id'])->where('warehouse_id', $warehouse)->count();
                    if ($AvailableQtyCount > 0) {
                        $AvailableQty = AvailableQty::where('product_id', $params['product_id'])->where('product_combination_id', $params['product_combination_id'])->where('warehouse_id', $warehouse)->firstOrFail();
                    } else {
                        $AvailableQty = (object)[
                            "product_id" => $params['product_id'],
                            "product_combination_id" => null,
                            "product_type" => $params['product_type'],
                            "warehouse_id" => $warehouse,
                            "stock_in" => "0",
                            "stock_out" => "0",
                            "remaining" => "0",
                            "price" => 0,
                            "discount_price" => null
                        ];
                    }
                }
            }
            return $this->successResponse(new AvailableQtyResource($AvailableQty), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }
}
