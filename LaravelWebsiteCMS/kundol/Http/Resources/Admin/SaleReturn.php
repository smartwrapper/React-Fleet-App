<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\SaleReturnDetail as SaleReturnDetailResource;
use App\Http\Resources\Admin\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleReturn extends JsonResource
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
            'adjustment' => $this->adjustment,
            'detail' => SaleReturnDetailResource::collection($this->saleReturnDetail),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
