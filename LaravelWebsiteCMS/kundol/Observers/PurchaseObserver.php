<?php

namespace App\Observers;

use App\Models\Admin\Account;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\Purchase;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;
use Log;
use Auth;

class PurchaseObserver
{

    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the Purchase "created" event.
     *
     * @param  \App\Models\Admin\Purchase  $purchase
     * @return void
     */
    public function created(Purchase $purchase)
    {
        // $transaction_number = Transaction::orderBy('id','DESC')->limit(1)->value('transaction_number');
        // $transaction_number = IntVal($transaction_number) + 1;
        // $parms['description'] = 'purchase';
        // $parms['transaction_number'] = $transaction_number;
        // $parms['transaction_date'] = date('ymd');
        // $sql = new Transaction;
        // $sql = $sql->create($parms);

        // $default_account = DefaultAccount::type('cash')->first();
        // $account_id = Account::where('reference_id',$purchase->purchaser_id)->where('type','supplier')->value('id');

        // $var['transaction_id'] = $sql->id;
        // $var['account_id'] = $default_account->account_id;
        // $var['reference_id'] = $purchase->id;
        // $var['type'] = 'purchase';
        // $var['dr_amount'] = '0';
        // $var['cr_amount'] = $purchase->total_amount;
        // $query = new TransactionDetail;
        // $query->create($var);

        // $var['transaction_id'] = $sql->id;
        // $var['account_id'] = $account_id;
        // $var['reference_id'] = $purchase->id;
        // $var['type'] = 'purchase';
        // $var['dr_amount'] = $purchase->total_amount;
        // $var['cr_amount'] = '0';
        // $query = new TransactionDetail;
        // $query->create($var);

        
        Log::info($this->logText . 'create a new purchase' . $purchase);
    }

    /**
     * Handle the Purchase "updated" event.
     *
     * @param  \App\Models\Admin\Purchase  $purchase
     * @return void
     */
    public function updated(Purchase $purchase)
    {
        Log::info($this->logText . 'update purchase' . $purchase);
    }

    /**
     * Handle the Purchase "deleted" event.
     *
     * @param  \App\Models\Admin\Purchase  $purchase
     * @return void
     */
    public function deleted(Purchase $purchase)
    {
        Log::info($this->logText . 'delete purchase' . $purchase);
    }

}
