<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\PurchaseReturnInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\PurchaseReturnRequest;
use App\Models\Admin\PurchaseDetail;
use App\Models\Admin\PurchaseReturn;
use App\Repository\Admin\PurchaseReturnRepository;
use App\Services\Admin\AvailableQty;
use App\Traits\ApiResponser;

class PurchaseReturnController extends Controller
{
    private $PurchaseReturnRepository;
    use ApiResponser;

    public function __construct(PurchaseReturnInterface $PurchaseReturnRepository)
    {
        $this->PurchaseReturnRepository = $PurchaseReturnRepository;
    }

    public function index()
    {
        return $this->PurchaseReturnRepository->all();
    }

    public function show(PurchaseReturn $purchaseReturn)
    {
        return $this->PurchaseReturnRepository->show($purchaseReturn);
    }

    public function store(PurchaseReturnRequest $request)
    {
        $parms = $request->all();
        foreach ($request->product_id as $key => $product_id) {
            if (isset($request->product_combination_id[$key])) {
                PurchaseDetail::select('id')->productCombinationPurchase($product_id, $request->product_combination_id[$key], $request->purchase_id)->firstOrFail();
            } else {
                $purchaseDetail = PurchaseDetail::select('id')->productPurchase($product_id, $request->purchase_id)->get();
                foreach ($purchaseDetail as $purchase) {
                    if ($purchase->product_combination_id != '') {
                        return $this->errorResponse('product combination id is missing!', 401);
                    }
                }
            }

            $availableQty = new AvailableQty;
            if (!isset($parms['product_combination_id'][$key])) {
                $parms['product_combination_id'][$key] = null;
            }
            if(isset($parms['qty'][$key]) && $parms['qty'][$key] > 0){
                $availableQty = $availableQty->availableQtyPurchase($product_id, $parms['product_combination_id'][$key], $parms['qty'][$key],$parms['purchase_id']);
                if (!$availableQty) {
                    \DB::rollBack();
                    return $this->errorResponse('Out of Stock with Qty index ' . $key . '', 500);
                }
            }

        }
        return $this->PurchaseReturnRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->PurchaseReturnRepository->destroy($id);
    }

}
