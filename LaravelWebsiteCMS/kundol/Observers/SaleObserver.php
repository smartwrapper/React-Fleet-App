<?php

namespace App\Observers;

use App\Models\Admin\Account;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\Sale;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;
use Log;
use Auth;

class SaleObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Sale "created" event.
     *
     * @param  \App\Models\Admin\Sale  $sale
     * @return void
     */
    public function created(Sale $sale)
    {
        // $transaction_number = Transaction::orderBy('id','DESC')->limit(1)->value('transaction_number');
        // $transaction_number = IntVal($transaction_number) + 1;
        // $parms['description'] = 'sale';
        // $parms['transaction_number'] = $transaction_number;
        // $parms['transaction_date'] = date('ymd');
        // $sql = new Transaction;
        // $sql = $sql->create($parms);

        // $default_account = DefaultAccount::type('cash')->first();
        // $account_id = Account::where('reference_id',$sale->customer_id)->where('type','customer')->value('id');

        // $var['transaction_id'] = $sql->id;
        // $var['account_id'] = $default_account->account_id;
        // $var['reference_id'] = $sale->id;
        // $var['type'] = 'sale';
        // $var['dr_amount'] = $sale->amount_paid;
        // $var['cr_amount'] = '0';
        // $query = new TransactionDetail;
        // $query->create($var);

        // $var['transaction_id'] = $sql->id;
        // $var['account_id'] = $account_id;
        // $var['reference_id'] = $sale->id;
        // $var['type'] = 'sale';
        // $var['dr_amount'] = '0';
        // $var['cr_amount'] = $sale->amount_paid;
        // $query = new TransactionDetail;
        // $query->create($var);

        Log::info($this->logText . 'create a new sale' . $sale);
    }

    /**
     * Handle the Sale "updated" event.
     *
     * @param  \App\Models\Admin\Sale  $sale
     * @return void
     */
    public function updated(Sale $sale)
    {
        Log::info($this->logText . 'update sale' . $sale);
    }

    /**
     * Handle the Sale "deleted" event.
     *
     * @param  \App\Models\Admin\Sale  $sale
     * @return void
     */
    public function deleted(Sale $sale)
    {
        Log::info($this->logText . 'delete sale' . $sale);
    }

}
