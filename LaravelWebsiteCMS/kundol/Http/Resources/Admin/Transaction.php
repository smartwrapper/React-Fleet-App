<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\TransactionDetail as TransactionDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
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
            'transaction_id' => $this->id,
            'transaction_number' => $this->transaction_number,
            'transaction_date' => $this->transaction_date,
            'description' => $this->description,
            'transaction_detail' => TransactionDetailResource::collection($this->whenLoaded('detail')),
        ];
    }
}
