<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Coa as CoaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Coa extends JsonResource
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
            'acc_id' => $this->account_id,
            'type' => $this->type,
            'cr' => $this->cr_amount,
            'dr' => $this->dr_amount,
        ];
    }
}
