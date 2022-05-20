<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\SaleReturnInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\SaleReturnRequest;
use App\Models\Admin\SaleDetail;
use App\Models\Admin\SaleReturn;
use App\Repository\Admin\SaleReturnRepository;
use App\Services\Admin\AvailableQty;
use App\Services\Admin\SaleReturnService;
use App\Traits\ApiResponser;

class SaleReturnController extends Controller
{
    private $SaleReturnRepository;
    use ApiResponser;

    public function __construct(SaleReturnInterface $SaleReturnRepository)
    {
        $this->SaleReturnRepository = $SaleReturnRepository;
    }

    public function index()
    {
        return $this->SaleReturnRepository->all();
    }

    public function show(SaleReturn $saleReturn)
    {
        return $this->SaleReturnRepository->show($saleReturn);
    }

    public function store(SaleReturnRequest $request)
    {
        $parms = $request->all();
        $validated = new SaleReturnService;
        $validated = $validated->saleReturnValidate($request);
        if ($validated != '1') {
            return $validated;
        }

        foreach ($request->product_id as $key => $product_id) {
            if (isset($request->product_combination_id[$key])) {
                SaleDetail::select('id')->productCombinationSale($product_id, $request->product_combination_id[$key], $request->sale_id)->firstOrFail();
            } else {
                $saleDetail = SaleDetail::select('id')->productSale($product_id, $request->sale_id)->get();
                foreach ($saleDetail as $sale) {
                    if ($sale->product_combination_id != '') {
                        return $this->errorResponse('product combination id is missing!', 401);
                    }
                }
            }

            $availableQty = new AvailableQty;
            if (!isset($parms['product_combination_id'][$key])) {
                $parms['product_combination_id'][$key] = null;
            }
            
            $availableQty = $availableQty->availableQtySale($product_id, $parms['product_combination_id'][$key], $parms['qty'][$key],$parms['sale_id']);
            if (!$availableQty) {
                \DB::rollBack();
                return $this->errorResponse('Out of Stock with Qty index ' . $key . '', 422);
            }

        }
        return $this->SaleReturnRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->SaleReturnRepository->destroy($id);
    }

}
