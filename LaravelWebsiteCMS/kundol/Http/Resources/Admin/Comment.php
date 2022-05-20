<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Http\Resources\Admin\User;
use Illuminate\Http\Resources\Json\JsonResource;


class Comment extends JsonResource
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
            'message' => $this->message,
            'created_at' => $this->created_at->diffForHumans(),
            'user' =>new User($this->user),
            'customer' => new CustomerResource($this->customer),
        ];
    }
}
