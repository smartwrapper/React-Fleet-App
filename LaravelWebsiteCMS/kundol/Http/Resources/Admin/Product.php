<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Brand as BrandResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\ProductAttribute as ProductAttributeResource;
use App\Http\Resources\Admin\AvailableQty as AvailableQtyResource;
use App\Http\Resources\Admin\ProductCategory as ProductCategoryResource;
use App\Http\Resources\Admin\ProductCombination as ProductCombinationResource;
use App\Http\Resources\Admin\ProductDetail as ProductDetailResource;
use App\Http\Resources\Admin\Tax as TaxResource;
use App\Http\Resources\Admin\Unit as UnitResource;
use App\Http\Resources\Admin\User as UserResource;
use App\Http\Resources\Web\Review as ReviewResource;
use App\Http\Resources\Web\Comment as CommentResource;
use App\Models\Admin\AvailableQty;
use App\Models\Admin\Currency;
use App\Models\Admin\Gallary;
use App\Models\Admin\ProductCombination;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    private $exchange_rate;

    public function toArray($request)
    {
        if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
            return [
                'product_id' => $this->id,
                'detail' => ProductDetailResource::collection($this->whenLoaded('detail')),
            ];
        }

        $this->exchange_rate = 1;
        $currency = [];
        if (isset($request->currency) && $request->currency != '') {
            $currency = Currency::findByCurrencyId($request->currency)->select('exchange_rate', 'symbol_position', 'code')->first();
            $this->exchange_rate = $currency->exchange_rate;
        }

        $variableMaxPrice = ProductCombination::where('product_id',$this->id)->max('price');
        $variableMinPrice = ProductCombination::where('product_id',$this->id)->min('price');


        if (\Request::route()->getName() == 'products.index') {
            $imagesOrder = $this->productGallaryDetail()->orderBy('id', 'asc')->pluck('gallary_id');
            $images = collect();
            foreach ($imagesOrder as $imageOrder) {
                $res = Gallary::where('id', $imageOrder)->first();
                if ($res) {
                    $images->push(Gallary::with('detail')->where('id', $imageOrder)->first());
                }
            }

            return [
                'product_id' => $this->id,
                'product_sku' => $this->when($this->product_type == 'simple', $this->sku),
                'product_type' => $this->product_type,
                'product_slug' => $this->product_slug,
                'product_video_url' => $this->video_url,
                'available_qty' => $this->when($this->product_type == 'simple', AvailableQty::productId($this->id)->value('remaining')),
                'product_gallary' => new GallaryResource(Gallary::with('detail')->find($this->gallary_id)),
                'product_gallary_detail' => GallaryResource::collection($images),
                'product_price' => $this->price * $this->exchange_rate,
                'product_price_symbol' => !isset($currency->symbol_position) ? $this->price * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->price * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->price * $this->exchange_rate)),
                'currency' => $currency,
                'product_discount_price' => $this->discount_price * $this->exchange_rate,
                'product_discount_price_symbol' => !isset($currency->symbol_position) ? $this->discount_price * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->discount_price * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->discount_price * $this->exchange_rate)),
                'product_unit' => new UnitResource($this->unit),
                'product_weight' => $this->product_weight,
                'product_status' => $this->product_status,
                'product_brand' => new BrandResource($this->brand),
                'product_tax' => new TaxResource($this->tax),
                'product_view' => $this->product_view,
                'is_featured' => $this->is_featured,
                'is_points' => $this->is_points,
                'product_min_order' => $this->product_min_order,
                'product_max_order' => $this->product_max_order,
                'seo_meta_tag' => $this->seo_meta_tag,
                'seo_desc' => $this->seo_desc,
                'product_rating' => $this->avg_rating,
                'stock' => new AvailableQtyResource($this->when($this->product_type == 'simple', $this->stock)),
                'category' => ProductCategoryResource::collection($this->whenLoaded('category')),
                'detail' => ProductDetailResource::collection($this->whenLoaded('detail')),
                'attribute' => ProductAttributeResource::collection($this->when($this->product_type == 'variable', $this->product_attribute)),
                'reviews' => ReviewResource::collection($this->review),
                'comments' => CommentResource::collection($this->comment),
                'product_price_symbol' => !isset($currency->symbol_position) ? $this->price * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->price * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->price * $this->exchange_rate)),
                'product_variable_price_symbol' => 
                !isset($currency->symbol_position) ? $variableMinPrice * $this->exchange_rate .'-'.$variableMaxPrice * $this->exchange_rate: 
                ($currency->symbol_position == 'right' 
                ? '('.($variableMinPrice * $this->exchange_rate) . ' ' . $currency->code .'-'.($variableMaxPrice * $this->exchange_rate) . ' ' . $currency->code.')' : '('.$currency->code . ' ' . ($variableMinPrice * $this->exchange_rate).'-'.$currency->code . ' ' . ($variableMaxPrice * $this->exchange_rate).')'),
            ];
        }
        if (\Request::route()->getName() == 'products.show'  || \Request::route()->getName() == 'client.wishlist.index' || \Request::route()->getName() == 'compare.index') {
            $imagesOrder = $this->productGallaryDetail()->orderBy('id', 'asc')->pluck('gallary_id');
            $images = collect();
            foreach ($imagesOrder as $imageOrder) {
                $res = Gallary::where('id', $imageOrder)->first();
                if ($res) {
                    $images->push(Gallary::with('detail')->where('id', $imageOrder)->first());
                }
            }
            return [
                'product_id' => $this->id,
                'product_sku' => $this->when($this->product_type == 'simple', $this->sku),
                'product_type' => $this->product_type,
                'product_slug' => $this->product_slug,
                'product_video_url' => $this->video_url,
                'available_qty' => $this->when($this->product_type == 'simple', AvailableQty::productId($this->id)->value('remaining')),
                'product_gallary' => new GallaryResource(Gallary::with('detail')->find($this->gallary_id)),
                'product_gallary_detail' => GallaryResource::collection($images),
                'product_price' => $this->price * $this->exchange_rate,
                'product_price_symbol' => !isset($currency->symbol_position) ? $this->price * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->price * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->price * $this->exchange_rate)),
                'currency' => $currency,
                'product_discount_price' => $this->discount_price * $this->exchange_rate,
                'product_discount_price_symbol' => !isset($currency->symbol_position) ? $this->discount_price * $this->exchange_rate : ($currency->symbol_position == 'right' ? ($this->discount_price * $this->exchange_rate) . ' ' . $currency->code : $currency->code . ' ' . ($this->discount_price * $this->exchange_rate)),
                'product_unit' => new UnitResource($this->unit),
                'product_weight' => $this->product_weight,
                'product_status' => $this->product_status,
                'product_brand' => new BrandResource($this->brand),
                'product_tax' => new TaxResource($this->tax),
                'product_view' => $this->product_view,
                'is_featured' => $this->is_featured,
                'is_points' => $this->is_points,
                'product_min_order' => $this->product_min_order,
                'product_max_order' => $this->product_max_order,
                'seo_meta_tag' => $this->seo_meta_tag,
                'seo_desc' => $this->seo_desc,
                'product_rating' => $this->avg_rating,
                'stock' => new AvailableQtyResource($this->when($this->product_type == 'simple', $this->stock)),
                'category' => ProductCategoryResource::collection($this->whenLoaded('category')),
                'detail' => ProductDetailResource::collection($this->whenLoaded('detail')),
                'attribute' => ProductAttributeResource::collection($this->when($this->product_type == 'variable', $this->product_attribute)),
                'product_combination' => ProductCombinationResource::collection($this->when($this->product_type == 'variable', $this->product_combination)),
                'reviews' => ReviewResource::collection($this->review),
                'comments' => CommentResource::collection($this->comment),
            ];
        }
        // dd($this->productGallaryDetail()->gallary_detail);
        $imagesOrder = $this->productGallaryDetail()->orderBy('id', 'asc')->pluck('gallary_id');
        $images = collect();
        foreach ($imagesOrder as $imageOrder) {
            $res = Gallary::where('id', $imageOrder)->first();
            if ($res) {
                $images->push(Gallary::where('id', $imageOrder)->first());
            }
        }
        return [
            'product_id' => $this->id,
            'product_sku' => $this->sku,
            'product_type' => $this->product_type,
            'product_slug' => $this->product_slug,
            'product_video_url' => $this->video_url,
            'available_qty' => $this->when($this->product_type == 'simple', AvailableQty::productId($this->id)->value('remaining')),
            'product_gallary' => new GallaryResource(Gallary::with('detail')->find($this->gallary_id)),
            'product_gallary_detail' => GallaryResource::collection($images),
            'product_price' => $this->price * $this->exchange_rate,
            'product_discount_price' => $this->discount_price * $this->exchange_rate,
            'product_unit' => new UnitResource($this->unit),
            'product_weight' => $this->product_weight,
            'product_status' => $this->product_status,
            'product_brand' => new BrandResource($this->brand),
            'product_tax' => new TaxResource($this->tax),
            'product_view' => $this->product_view,
            'is_featured' => $this->is_featured,
            'is_points' => $this->is_points,
            'product_min_order' => $this->product_min_order,
            'product_max_order' => $this->product_max_order,
            'seo_meta_tag' => $this->seo_meta_tag,
            'seo_desc' => $this->seo_desc,
            'product_user' => new UserResource($this->user),
            'category' => ProductCategoryResource::collection($this->whenLoaded('category')),
            'detail' => ProductDetailResource::collection($this->whenLoaded('detail')),
            'combination' => ProductAttributeResource::collection($this->when($this->product_type == 'variable', $this->product_attribute)),
            'combination_detail' => ProductCombinationResource::collection($this->when($this->product_type == 'variable', $this->product_combination)),
            'reviews' => ReviewResource::collection($this->review),
            'comments' => CommentResource::collection($this->comment),
            'stock' => new AvailableQtyResource($this->when($this->product_type == 'simple', $this->stock)),
        ];
    }
}
