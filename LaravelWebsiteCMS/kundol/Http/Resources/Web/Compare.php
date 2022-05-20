<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Admin\Product;
use App\Models\Admin\Language;
use App\Http\Resources\Admin\Product as ProductResource;


class Compare extends JsonResource
{
    public function toArray($request)
    {
        // $product = Product::type()->with('product_attribute.attribute.attribute_detail')->with('gallary');
        // $languageId = Language::defaultLanguage()->value('id');
        // $product = $product->getAttributeDetailByLanguage($languageId);
        // $product = $product->getVariationDetailByLanguage($languageId);
        // $product = $product->getProductDetailByLanguageId($languageId);
        // $product = $product->where('id',$this->products->id)->first();
           

            

        return [
            'compare' => $this->id,
            'products' => new ProductResource($this->whenLoaded('products')),
        ];
    }
}
