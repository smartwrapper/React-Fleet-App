<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\PurchaseReturnDetail as PurchaseReturnDetailResource;
use App\Http\Resources\Admin\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseReturn extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'adjustment' => $this->adjustment,
            'detail' => PurchaseReturnDetailResource::collection($this->purchaseReturnDetail),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
