<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Barcode extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product_id' => $this['product_id'],
            'product_combination_id' => $this['product_combination_id'],
            'title' => $this['title'],
            'price' => $this['price'],
            'image' => $this['image'],
            'category' => $this['category'],
            'src' => $this['src'],
        ];
    }
}
