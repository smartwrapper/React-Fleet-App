<?php

namespace App\Repository\Admin;

use App\Contract\Admin\PurchaseReturnInterface;
use App\Http\Resources\Admin\PurchaseReturn as PurchaseReturnResource;
use App\Models\Admin\AvailableQty as AvailableQtyModel;
use App\Models\Admin\Language;
use App\Models\Admin\PurchaseReturn;
use App\Models\Admin\PurchaseReturnDetail;
use App\Services\Admin\PurchaseReturnService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class PurchaseReturnRepository implements PurchaseReturnInterface
{
    use ApiResponser;
    public function all()
    {
        $purchaseReturn = new PurchaseReturn;
        if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
            $search = $_GET['searchParameter'];
            $purchase = $purchase->where('id', 'like', '%' . $_GET['searchParameter'] . '%')->orWhere('adjustment', 'like', '%' . $_GET['searchParameter'] . '%');
        }
        if (isset($_GET['getPurchase']) && $_GET['getPurchase'] == '1') {
            $purchaseReturn = $purchaseReturn->with('purchase');
        }
        $languageId = Language::defaultLanguage()->value('id');
        if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            $language = Language::languageId($_GET['language_id'])->firstOrFail();
            $languageId = $language->id;
        }
        if (isset($_GET['getProductDetail']) && $_GET['getProductDetail'] == '1') {
            $purchaseReturn = $purchaseReturn->with('purchaseReturnDetail.product.detail', function ($querys) use ($languageId) {
                $querys->where('language_id', $languageId);
            });
        }
        if (isset($_GET['getProductCombinationDetail']) && $_GET['getProductCombinationDetail'] == '1') {
            $purchaseReturn = $purchaseReturn->with('purchaseReturnDetail.product_combination');
        }
        if (isset($_GET['getCreatedBy']) && $_GET['getCreatedBy'] == '1') {
            $purchaseReturn = $purchaseReturn->with('user');
        }
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }
        // return $purchaseReturn->paginate($numOfResult);
        try {

            return $this->successResponse(PurchaseReturnResource::collection($purchaseReturn->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($purchaseReturn)
    {
        $purchaseReturn = PurchaseReturn::purchaseReturnId($purchaseReturn->id);
        if (isset($_GET['getPurchase']) && $_GET['getPurchase'] == '1') {
            $purchaseReturn = $purchaseReturn->with('purchase');
        }
        $languageId = Language::defaultLanguage()->value('id');
        if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            $language = Language::languageId($_GET['language_id'])->firstOrFail();
            $languageId = $language->id;
        }
        if (isset($_GET['getProductDetail']) && $_GET['getProductDetail'] == '1') {
            $purchaseReturn = $purchaseReturn->with('purchaseReturnDetail.product.detail', function ($querys) use ($languageId) {
                $querys->where('language_id', $languageId);
            });
        }
        if (isset($_GET['getProductCombinationDetail']) && $_GET['getProductCombinationDetail'] == '1') {
            $purchaseReturn = $purchaseReturn->with('purchaseReturnDetail.product_combination');
        }
        try {

            return $this->successResponse(new PurchaseReturnResource($purchaseReturn->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        \DB::beginTransaction();
        try {
            if (isset($parms['qty']) && count($parms['qty']) > 0) {
                $purchaseReturn = PurchaseReturn::create([
                    'adjustment' => $parms['adjustment'],
                ]);
            } else {
                return $this->errorResponse('Qty Not Selected!');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
        foreach ($parms['product_id'] as $key => $product_id) {
            if (!isset($parms['qty'][$key]) || (isset($parms['qty'][$key]) && $parms['qty'][$key] == 0)) {
                continue;
            }
            $product_combination_id = null;
            if (isset($parms['product_combination_id'][$key])) {
                $product_combination_id = $parms['product_combination_id'][$key];
            }
            // if(!isset($parms['adjustment'][$key])){
            //     $parms['adjustment'][$key] = 0;
            // }
            $purchaseReturnDetail = PurchaseReturnDetail::create([
                'purchase_return_id' => $purchaseReturn->id,
                'purchase_id' => $parms['purchase_id'],
                'product_id' => $product_id,
                'product_combination_id' => $product_combination_id,
                'qty' => $parms['qty'][$key],
            ]);

            $purchaseReturnService = new PurchaseReturnService;
            $purchaseReturnService = $purchaseReturnService->storeInventory($product_id, $parms['warehouse_id'], $purchaseReturn->id, $parms['qty'][$key], $product_combination_id);

            if (!$purchaseReturnService) {
                return $this->errorResponse('Purchase Return can not saved due to internal server error!', 422);
            }

            // $default_account = DefaultAccount::pluck('account_id', 'type')->toArray();
            // $account_id = Account::where('type', 'supplier')->where('reference_id', $purchaseReturnDetail->purchase->purchaser_id)->value('id');
            // if (!$account_id) {
            //     $account_id = $default_account['supplier'];
            // }

            $price = AvailableQtyModel::where('product_id', $product_id)->where('product_combination_id', $parms['product_combination_id'][$key])->value('price');

            // $inc = Transaction::latest()->value('transaction_number');
            // $inc = intVal($inc);
            // $inc++;
            // $trans_id = Transaction::create([
            //     'transaction_number' => $inc,
            //     'transaction_date' => date('Y-m-d'),
            //     'description' => 'purchase return item',
            // ]);
            // TransactionDetail::create([
            //     'transaction_id' => $trans_id->id,
            //     'account_id' => $account_id,
            //     'reference_id' => $purchaseReturn->id,
            //     'user_id' => $purchaseReturnDetail->purchase->purchaser_id,
            //     'type' => 'purchase',
            //     'dr_amount' => '0',
            //     'cr_amount' => $price * $parms['qty'][$key],
            // ]);
            // TransactionDetail::create([
            //     'transaction_id' => $trans_id->id,
            //     'account_id' => isset($default_account['cash']) ? $default_account['cash'] : 3,
            //     'reference_id' => $purchaseReturn->id,
            //     'user_id' => $purchaseReturnDetail->purchase->purchaser_id,
            //     'type' => 'cash',
            //     'dr_amount' => $price * $parms['qty'][$key],
            //     'cr_amount' => '0',
            // ]);
        }

        if ($purchaseReturn) {
            \DB::commit();
            return $this->successResponse(new PurchaseReturnResource($purchaseReturn), 'Purchase return Save Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($purchaseReturn)
    {
        try {
            $sql = PurchaseReturn::findOrFail($purchaseReturn);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Purchase return Delete Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }
}
