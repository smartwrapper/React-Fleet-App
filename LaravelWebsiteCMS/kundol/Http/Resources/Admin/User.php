<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Role as RoleResource;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;

use App\Http\Resources\Admin\PermissionRole as PermissionRoleResource;
use App\Models\Admin\PermissionRole;

class User extends JsonResource
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
            'u_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'role' => new RoleResource($this->role),
            'warehouse' => Warehouse::collection($this->warehouses)

        ];
    }
}