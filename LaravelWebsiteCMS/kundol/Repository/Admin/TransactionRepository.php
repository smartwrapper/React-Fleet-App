<?php

namespace App\Repository\Admin;

use App\Contract\Admin\TransactionInterface;
use App\Http\Resources\Admin\TransactionDetail as TransactionDetailResource;
use App\Models\Admin\TransactionDetail;
use App\Models\Admin\Transaction;

use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class TransactionRepository implements TransactionInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $Transaction = new TransactionDetail;
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $Transaction = $Transaction->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $Transaction = $Transaction->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(TransactionDetailResource::collection($Transaction->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $inc = Transaction::latest()->value('transaction_number');
            $inc = intVal($inc);
            $inc++;
            $trans_id = Transaction::create([
                'transaction_number' => $inc,
                'transaction_date' => date('Y-m-d'),
                'description' => $parms['refrence']
            ]);
            $sql = TransactionDetail::create([
                'transaction_id' => $trans_id->id,
                'account_id' => $parms['account_id'],
                'reference_id' =>0,
                'user_id' => 0,
                'type' => '',
                'dr_amount' => $parms['dr_amount'],
                'cr_amount' => $parms['cr_amount']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new TransactionDetailResource($sql), 'Timezone Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

   
}
