<?php

namespace App\Repository\Web;

use App\Contract\Web\PointInterface;
use App\Http\Resources\Web\Point as PointResource;
use App\Models\Admin\Account;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\Setting;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;
use App\Models\Web\Point;
use App\Traits\ApiResponser;
use Auth;

class PointRepository implements PointInterface
{
    use ApiResponser;
    public function all($params)
    {
        try {
            $sql = Point::findStatus('0');
            if (\Request::route()->getName() == 'customer.points') {
                if (Auth::check()) {
                    $sql = $sql->customerId(Auth::id());
                }
            }

            if (isset($_GET['sum']) && $_GET['sum'] == '1') {
                $sql = $sql->sum('points');
                return $this->successResponseArray($sql, 'Data Get Successfully!');
            } else {
                if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                    $numOfResult = $_GET['limit'];
                } else {
                    $numOfResult = 100;
                }
                $sql = $sql->paginate($numOfResult);
                return $this->successResponse(PointResource::collection($sql), 'Data Get Successfully!');
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store()
    {
        try {
            $sum = Point::findStatus('0')->customerId(Auth::id())->sum('points');
            $value = Setting::where('type', 'point_setting')->pluck('value', 'key')->toArray();
            if ($value['point_setting'] != 'enable') {
                return $this->errorResponse('Sorry! Points Setting Disabled');
            }
            $redeem = Setting::where('key', 'redeem_point')->where('type', 'point_setting')->value('value');
            if ($sum >= $redeem) {
                $default_account = DefaultAccount::pluck('account_id', 'type')->toArray();
                $account_id = Account::where('type', 'customer')->where('reference_id', Auth::id())->value('id');
                if (!$account_id) {
                    $account_id = $default_account['customer'];
                }

                $inc = Transaction::latest()->value('transaction_number');
                $inc = intVal($inc);
                $inc++;

                $per_point = Setting::where('key', 'per_point')->where('type', 'point_setting')->value('value');
                $points = $per_point * $sum;
                $trans_id = Transaction::create([
                    'transaction_number' => $inc,
                    'transaction_date' => date('Y-m-d'),
                    'description' => 'sale return item'
                ]);
                TransactionDetail::create([
                    'transaction_id' => $trans_id->id,
                    'account_id' => $account_id,
                    'reference_id' => '',
                    'user_id' => Auth::id(),
                    'type' => 'redeem',
                    'dr_amount' => $points,
                    'cr_amount' => '0',
                ]);

                Point::create([
                    'points' => $sum,
                    'type' => 'redeem',
                    'description' => 'redeem points',
                    'reference_id' => 0,
                    'customer_id' => Auth::id(),
                    'status' => '0'
                ]);

                // Point::findStatus('0')->customerId(Auth::id())->update(['status' => '1']);
                
                $sql = Point::findStatus('0');
                $sql = $sql->sum('points');
                return $this->successResponse(PointResource::collection($sql), 'Data Redeem Successfully!');
            }
            else{
                return $this->errorResponse('Sorry! Your Points is less than '.$redeem);
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }
}
