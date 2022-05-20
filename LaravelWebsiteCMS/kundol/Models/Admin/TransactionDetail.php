<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{

    protected $table="transaction_detail";

    protected $fillable = [
        'transaction_id', 'account_id', 'reference_id','type','dr_amount','cr_amount','user_id'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Models\Admin\Transaction');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Admin\Customer');
    }

    public function account()
    {
        return $this->belongsTo('App\Models\Admin\Account');
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('transaction_id', 'like', '%' . $parameter . '%')
        ->Orwhere('account_id', 'like', '%' . $parameter . '%')
        ->Orwhere('dr_amount', 'like', '%' . $parameter . '%')
        ->Orwhere('cr_amount', 'like', '%' . $parameter . '%');
    }
}
