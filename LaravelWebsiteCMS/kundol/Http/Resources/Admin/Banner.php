<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\SliderNavigation as SliderNavigationResource;
use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Banner extends JsonResource
{
    public function toArray($request)
    {
        if (\Request::route()->getName() == 'client.banner.index' || \Request::route()->getName() == 'client.banner.show') {
            return [
                'banner_id' => $this->id,
                'banner_title' => $this->title,
                'banner_description' => $this->description,
                'banner_ref_id' => $this->ref_id,
                'banner_status' => $this->status,
                'banner_navigation' => $this->slider_navigation,
                'gallary' => isset($this->gallary->name) ? $this->gallary->name : '',
                'language' => isset($this->language->id) ? $this->language->id : '',
            ];
        }
        return [
            'banner_id' => $this->id,
            'banner_title' => $this->title,
            'banner_description' => $this->description,
            'banner_ref_id' => $this->ref_id,
            'banner_status' => $this->status,
            'banner_navigation' => new SliderNavigationResource($this->whenLoaded('slider_navigation')),
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
            'language' => new LanguageResource($this->whenLoaded('language')),
        ];
    }
}
