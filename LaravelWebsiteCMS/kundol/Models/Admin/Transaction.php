<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_number', 'transaction_date', 'description'
    ];

    public function detail()
    {
        return $this->hasMany('App\Models\Admin\TransactionDetail');
    }
}
