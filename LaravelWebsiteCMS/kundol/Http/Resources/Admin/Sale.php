<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\SaleDetail as SaleDetailResource;
use App\Http\Resources\Admin\Tax as TaxResource;
use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;

class Sale extends JsonResource
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
            'desc' => $this->desc,
            'payable' => $this->payable,
            'discount' => $this->discount,
            'tax_id' => new TaxResource($this->tax),
            'tax_amount' => $this->tax_amount,
            'amount_paid' => $this->amount_paid,
            'due_amount' => $this->due_amount,
            'sale_date' => $this->sale_date,
            'customer' => new CustomerResource($this->customer),
            'warehouse' => new WarehouseResource($this->warehouse),
            'detail' =>  SaleDetailResource::collection($this->whenLoaded('detail'))
        ];
    }
}
