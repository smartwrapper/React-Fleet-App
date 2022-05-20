<?php

namespace App\Repository\Admin;

use App\Contract\Admin\PurchaseInterface;
use App\Http\Resources\Admin\Purchase as PurchaseResource;
use App\Models\Admin\Language;
use App\Models\Admin\Purchase;
use App\Services\Admin\PurchaseDetailService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class PurchaseRepository implements PurchaseInterface
{
    use ApiResponser;
    public function all()
    {
        $purchase = new Purchase;
        if (isset($_GET['getPurchaser']) && $_GET['getPurchaser'] == '1') {
            $purchase = $purchase->with('purchaser');
        }
        if (isset($_GET['getPurchaseDetail']) && $_GET['getPurchaseDetail'] == '1') {
            $purchase = $purchase->with('purchase_detail');
        }
        $languageId = Language::defaultLanguage()->value('id');
        if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            $language = Language::languageId($_GET['language_id'])->firstOrFail();
            $languageId = $language->id;
        }
        if (isset($_GET['getProductDetail']) && $_GET['getProductDetail'] == '1') {
            $purchase = $purchase->with('purchase_detail.product.detail', function ($querys) use ($languageId) {
                $querys->where('language_id', $languageId);
            });
        }
        if (isset($_GET['getProductCombinationDetail']) && $_GET['getProductCombinationDetail'] == '1') {
            $purchase = $purchase->with('purchase_detail.product_combination');
        }
        if (isset($_GET['getWarehouse']) && $_GET['getWarehouse'] == '1') {
            $purchase = $purchase->with('warehouse');
        }
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }

        if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
            $search = $_GET['searchParameter'];
            $purchase = $purchase->Where(function ($query) use ($search) {
                $query->whereHas('purchaser', function ($query) use ($search) {
                    $query->where('purchaser.first_name', 'like', '%' . $search . '%')->orWhere('purchaser.last_name', 'like', '%' . $search . '%');
                })->orWhereHas('warehouse', function ($query) use ($search) {
                    $query->where('warehouses.name', 'like', '%' . $search . '%');
                })->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $sortBy = ['id', 'total_amount', 'amount_paid', 'discount_amount', 'amount_due', 'purchase_date'];
        $sortType = ['ASC', 'DESC', 'asc', 'desc'];
        if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
            $purchase = $purchase->orderBy($_GET['sortBy'], $_GET['sortType']);
        }
        try {
            return $this->successResponse(PurchaseResource::collection($purchase->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($purchase)
    {
        $purchase = Purchase::purchaseId($purchase->id);
        if (isset($_GET['getPurchaser']) && $_GET['getPurchaser'] == '1') {
            $purchase = $purchase->with('purchaser');
        }
        if (isset($_GET['getPurchaseDetail']) && $_GET['getPurchaseDetail'] == '1') {
            $purchase = $purchase->with('purchase_detail');
        }
        $languageId = Language::defaultLanguage()->value('id');
        if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            $language = Language::languageId($_GET['language_id'])->firstOrFail();
            $languageId = $language->id;
        }
        if (isset($_GET['getProductDetail']) && $_GET['getProductDetail'] == '1') {
            $purchase = $purchase->with('purchase_detail.product.detail', function ($querys) use ($languageId) {
                $querys->where('language_id', $languageId);
            });
        }
        if (isset($_GET['getProductCombinationDetail']) && $_GET['getProductCombinationDetail'] == '1') {
            $purchase = $purchase->with('purchase_detail.product_combination');
        }
        if (isset($_GET['getWarehouse']) && $_GET['getWarehouse'] == '1') {
            $purchase = $purchase->with('warehouse');
        }
        try {

            return $this->successResponse(new PurchaseResource($purchase->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $sql = new Purchase;
            $parms['created_by'] = \Auth::id();
            $purchase = $sql->create($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            $purchaseDetailService = new PurchaseDetailService;
            $sql = $purchaseDetailService->store($parms, $purchase->id, $purchase->warehouse_id);
        }

        if ($sql) {
            // $default_account = DefaultAccount::pluck('account_id', 'type')->toArray();
            // $account_id = Account::where('type', 'supplier')->where('reference_id', $parms['purchaser_id'])->value('id');
            // if (!$account_id) {
            //     $account_id = $default_account['supplier'];
            // }
            // $inc = Transaction::latest()->value('transaction_number');
            // $inc = intVal($inc);
            // $inc++;
            // $trans_id = Transaction::create([
            //     'transaction_number' => $inc,
            //     'transaction_date' => date('Y-m-d'),
            //     'description' => 'purchase item',
            // ]);
            // TransactionDetail::create([
            //     'transaction_id' => $trans_id->id,
            //     'account_id' => $account_id,
            //     'reference_id' => $purchase->id,
            //     'type' => 'purchase',
            //     'user_id' => $parms['purchaser_id'],
            //     'dr_amount' => $purchase->amount_paid,
            //     'cr_amount' => '0',
            // ]);
            // TransactionDetail::create([
            //     'transaction_id' => $trans_id->id,
            //     'account_id' => $default_account['cash'],
            //     'reference_id' => $purchase->id,
            //     'user_id' => $parms['purchaser_id'],
            //     'type' => 'cash',
            //     'dr_amount' => '0',
            //     'cr_amount' => $purchase->amount_paid,
            // ]);
            DB::commit();
            return $this->successResponse(new PurchaseResource($purchase), 'Purchase Save Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($purchase)
    {
        DB::beginTransaction();
        try {
            $sql = Purchase::findOrFail($purchase);
            $sql->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
        if ($sql) {
            DB::commit();
            return $this->successResponse('', 'Purchase Delete Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }
}
