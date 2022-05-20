<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\StockTransferDetail as StockTransferDetailResource;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Product as ProductResource;

class StockTransfer extends JsonResource
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
            'stock_transfer_id' => $this->id,
            'reference_no' => $this->reference_no,
            'trasfer_date' => $this->trasfer_date,
            'notes' => $this->notes,
            'warehouse_from' => new WarehouseResource($this->whenLoaded('from_warehouse')),
            'warehouse_to' => new WarehouseResource($this->whenLoaded('to_warehouse')),
            'detail' => StockTransferDetailResource::collection($this->whenLoaded('stock_transfer_detail')),
        ];
    }
}
