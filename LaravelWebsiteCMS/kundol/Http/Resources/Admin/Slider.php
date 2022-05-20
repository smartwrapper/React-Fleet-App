<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Language as LanguageResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\SliderNavigation as SliderNavigationResource;
use App\Http\Resources\Admin\SliderType as SliderTypeResource;
use App\Models\Admin\Page;
use App\Models\Admin\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class Slider extends JsonResource
{
    public function toArray($request)
    {
        $url = '';
        if($this->slider_navigation->id == 1);
        {
            $url = url('shop')."?category=".$this->ref_id;
        }
        if($this->slider_navigation->id == 2){
            $product = Product::productId($this->ref_id)->first();
            $url = url('')."/product/".$this->ref_id.'/'.$product->product_slug;
        }
        if($this->slider_navigation->id == 3){
            $page = Page::pageId($this->ref_id)->first();
            $url = url('')."/page/".$page->slug;
        }
        if($this->slider_navigation->id == 4){
            $url = $this->url;
        }

        if (\Request::route()->getName() == 'client.slider.index' || \Request::route()->getName() == 'client.slider.show') {
            return [
                'slider_id' => $this->id,
                'slider_title' => $this->title,
                'slider_description' => $this->description,
                'slider_position' => $this->position,
                'slider_textcontent' => $this->textcontent,
                'slider_text' => $this->text,
                'slider_navigation' => isset($this->slider_navigation->id) ? $this->slider_navigation->id : '',
                'slider_ref_id' => $this->ref_id,
                'slider_type' => isset($this->slider_type->id) ? $this->slider_type->id : '',
                'gallary' => isset($this->gallary->name) ? $this->gallary->name : '',
                'language' => isset($this->language->id) ? $this->language->id : '',
                'slider_url' => $url,
            ];
        }
        return [
            'slider_id' => $this->id,
            'slider_title' => $this->title,
            'slider_description' => $this->description,
            'slider_position' => $this->position,
            'slider_textcontent' => $this->textcontent,
            'slider_text' => $this->text,
            'slider_ref_id' => $this->ref_id,
            'language' => new LanguageResource($this->whenLoaded('language')),
            'slider_type' => new SliderTypeResource($this->whenLoaded('slider_type')),
            'slider_navigation' => new SliderNavigationResource($this->whenLoaded('slider_navigation')),
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
            'slider_url' => $this->url,
        ];
    }
}
