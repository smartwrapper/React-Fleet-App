<?php

namespace App\Repository\Admin;

use App\Contract\Admin\AccountInterface;
use App\Http\Resources\Admin\Account as AccountResource;
use App\Models\Admin\Account;
use App\Models\Admin\AccountDetail;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class AccountRepository implements AccountInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $account = new Account;
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['parent_id']) && $_GET['parent_id'] != null) {
                $account = $account->where('parent_id',$_GET['parent_id']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $account = $account->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $account = $account->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(AccountResource::collection($account->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($account)
    {
        // return $Account->id;
        $account = Account::coaId($account->id);
        try {
            return $this->successResponse(new AccountResource($account->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $current_code =  Account::coaId($parms['account_id'])->first();
            $sql =  Account::parentId($parms['account_id'])->orderBy('id','DESC')->first();

            if($sql){
                $last_code = str_replace($current_code->code, '' , $sql->code);
                $last_code = intVal($last_code);
                $last_code++;
                $new_code = $last_code;
                if($last_code < 10){
                    $new_code = '0'.$last_code;
                }
                $new_code = $current_code->code.$new_code;
            }
            else{
                $new_code = $current_code->code.'01';
            }
            $parms['account_type'] = $current_code->account_type;
            $parms['code'] = $new_code;
            $parms['status'] = '1';
            $parms['parent_id'] = $parms['account_id'];
            $sql = new Account;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new AccountResource($sql), 'Account Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $account)
    {
        // return $parms;
        try {
            $current_code =  Account::coaId($parms['account_id'])->first();
            $sql =  Account::parentId($parms['account_id'])->orderBy('id','DESC')->first();

            if($sql){
                $last_code = str_replace($current_code->code, '' , $sql->code);
                $last_code = intVal($last_code);
                $last_code++;
                $new_code = $last_code;
                if($last_code < 10){
                    $new_code = '0'.$last_code;
                }
                $new_code = $current_code->code.$new_code;
            }
            else{
                $new_code = $current_code->code.'01';
            }
            $parms['account_type'] = $current_code->account_type;
            $parms['code'] = $new_code;
            $parms['status'] = '1';
            $parms['parent_id'] = $parms['account_id'];
            $account->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($account) {
            return $this->successResponse(new AccountResource($account), 'Account Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($account)
    {
        try {
            $sql = Account::findOrFail($account);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Account Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
