<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\PurchaseDetail as PurchaseDetailResource;
use App\Http\Resources\Admin\Purchaser as PurchaserResource;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Purchase extends JsonResource
{
    public function toArray($request)
    {
        return [
            'purchase_id' => $this->id,
            'purchaser' => new PurchaserResource($this->whenLoaded('purchaser')),
            'purchase_date' => $this->purchase_date,
            'description' => $this->description,
            'total_amount' => $this->total_amount,
            'amount_paid' => $this->amount_paid,
            'discount_amount' => $this->discount_amount,
            'amount_due' => $this->amount_due,
            'detail' => PurchaseDetailResource::collection($this->whenLoaded('purchase_detail')),
            'warehouse' => new WarehouseResource($this->whenLoaded('warehouse')),
        ];
    }
}
