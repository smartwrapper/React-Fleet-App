<?php

namespace App\Services\Admin;

use App\Http\Requests\SaleReturnRequest;
use App\Models\Admin\Account;
use App\Models\Admin\AvailableQty as AvailableQtyModel;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\Inventory;
use App\Models\Admin\SaleReturn;
use App\Models\Admin\SaleReturnDetail;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;
use App\Traits\ApiResponser;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SaleReturnService
{
    use ValidatesRequests, ApiResponser;
    public function saleReturnData($parms, $type)
    {
        \DB::beginTransaction();
        $query = new SaleReturn;
        $query = $query->create([
            'adjustment' => $parms['adjustment']
        ]);
        foreach ($parms['product_id'] as $i => $saleDetail) {
            try {
                $data['sale_id'] = $parms['sale_id'];
                $data['product_id'] = $saleDetail;
                $data['sale_return_id'] = $query->id;
                // if($data['product_id'] == 48)
                //     return $data['sale_return_id'] = $query->id;
                if (!isset($parms['product_combination_id'][$i])) {
                    $parms['product_combination_id'][$i] = null;
                }

                $data['product_combination_id'] = $parms['product_combination_id'][$i];
                $data['qty'] = $parms['qty'][$i];
                if(!isset($parms['adjustment'][$i])){
                    $parms['adjustment'][$i] = 0;
                }
                $query1 = new SaleReturnDetail;
                $query1 = $query1->create($data);
            } catch (Exception $e) {
                \DB::rollBack();
                return $this->errorResponse('Purchase can not saved due to internal server error!', 422);
            }

            try {
                Inventory::create([
                    'product_id' => $data['product_id'],
                    'warehouse_id' => $query1->sale->warehouse_id,
                    'customer_id' => null,
                    'stock_status' => 'IN',
                    'reference_id' => $query->id,
                    'qty' => $data['qty'],
                    'product_combination_id' => $data['product_combination_id'],
                    'stock_type' => 'SaleReturn',
                ]);
            } catch (Exception $e) {
                \DB::rollBack();
                return $this->errorResponse('Purchase can not saved due to internal server error!', 422);
            }

            $default_account = DefaultAccount::pluck('account_id', 'type')->toArray();
            $account_id = Account::where('type', 'customer')->where('reference_id', $query1->sale->customer_id)->value('id');
            if (!$account_id) {
                $account_id = $default_account['customer'];
            }

            $price = AvailableQtyModel::where('product_id', $data['product_id'])->where('product_combination_id', $data['product_combination_id'])->value('price');

            $inc = Transaction::latest()->value('transaction_number');
            $inc = intVal($inc);
            $inc++;
            $trans_id = Transaction::create([
                'transaction_number' => $inc,
                'transaction_date' => date('Y-m-d'),
                'description' => 'sale return item',
            ]);
            TransactionDetail::create([
                'transaction_id' => $trans_id->id,
                'account_id' => $account_id,
                'reference_id' => $query->id,
                'user_id' => $query1->sale->customer_id,
                'type' => 'sale',
                'dr_amount' => $price * $data['qty'],
                'cr_amount' => '0',
            ]);
            TransactionDetail::create([
                'transaction_id' => $trans_id->id,
                'account_id' => isset($default_account['cash']) ? $default_account['cash'] : 3,
                'reference_id' => $query->id,
                'user_id' => $query1->sale->customer_id,
                'type' => 'cash',
                'dr_amount' => '0',
                'cr_amount' => $price * $data['qty'],
            ]);
        }
        \DB::commit();
        return 1;
    }

    public function saleReturnValidate($parms)
    {
        $request = new SaleReturnRequest;
        $this->validate($parms, $request->rules());

        foreach ($parms['product_id'] as $i => $saleDetail) {
            $message = '';
            if (!isset($parms['product_id'][$i])) {
                $message = 'product_id index ' . $i . ' is required.';
            }
            if (!isset($parms['qty'][$i])) {
                $message = 'qty index ' . $i . ' is required.';
            }
            if ($message != '') {
                return $this->errorResponse($message, 401);
            }
        }
        if (!isset($parms['product_combination_id'])) {
            $message = 'product_combination_id is required.';
        }
        if (!is_array($parms['product_combination_id'])) {
            $message = 'product_combination_id must be in array.';
        }
        if (count($parms['product_id']) != count($parms['product_combination_id'])) {
            $message = 'product_combination_id is required.';
        }
        if ($message != '') {
            return $this->errorResponse($message, 401);
        }
        return 1;
    }
}
