<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CoaInterface;
use App\Http\Resources\Admin\Coa as CoaResource;
use App\Models\Admin\Coa;
use App\Models\Admin\TransactionDetail;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class CoaRepository implements CoaInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $coa = new TransactionDetail;
            // if (isset($_GET['getAccountType']) && $_GET['getAccountType'] == '1') {
            //     $coa = $coa->with('AccountType');
            // }
            // if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
            //     $coa = $coa->with('detail');
            // }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            // $sortBy = ['id', 'account_title'];
            // $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            // if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
            //     $coa = $coa->orderBy($_GET['sortBy'], $_GET['sortType']);
            // }
            $coa = $coa->where('user_id',\Auth::id())->where('type','sale');

            return $this->successResponse(CoaResource::collection($coa->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

}
