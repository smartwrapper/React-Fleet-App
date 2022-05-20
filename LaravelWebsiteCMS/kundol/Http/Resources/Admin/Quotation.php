<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Http\Resources\Admin\Purchaser as PurchaserResource;
use App\Http\Resources\Admin\QuotationDetail as QuotationDetailResource;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Quotation extends JsonResource
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
            'uuid' => $this->uuid,
            'type' => $this->type,
            'purchaser' => new PurchaserResource($this->whenLoaded('purchaser')),
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'warehouse' => new WarehouseResource($this->whenLoaded('warehouse')),
            'grand_total' => $this->grand_total,
            'note' => $this->note,
            'quotationDetail' => QuotationDetailResource::collection($this->whenLoaded('quotation_detail')),
        ];
    }
}
