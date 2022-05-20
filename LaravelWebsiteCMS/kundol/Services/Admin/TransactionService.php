<?php

namespace App\Services\Admin;

use App\Models\Admin\Transaction;
use App\Traits\ApiResponser;

class TransactionService
{
    use ApiResponser;
    public function transaction($desc, $type)
    {
        $transaction_number = Transaction::orderBy('id','DESC')->limit(1)->value('transaction_number');
        $transaction_number = IntVal($transaction_number) + 1;
        $parms['description'] = $desc;
        $parms['transaction_number'] = $transaction_number;
        $parms['transaction_date'] = date('ymd');
        // for()
    }
}
