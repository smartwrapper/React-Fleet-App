<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\TransactionDetail as TransactionDetailResource;
use App\Http\Resources\Admin\Account as AccountResource;
use App\Http\Resources\Admin\Transaction as TransactionResource;
use App\Http\Resources\Admin\Customer as CustomerResource;
use Illuminate\Http\Resources\Json\JsonResource;


class TransactionDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'account_id' => new AccountResource($this->account), 
            'user_id' => new CustomerResource($this->user),
            'type' => $this->type,
            'transaction' => new  TransactionResource($this->transaction), 
            'reference_id' => $this->reference_id,
            'dr_amount' => $this->dr_amount,
            'cr_amount' => $this->cr_amount
        ];
    }
}
