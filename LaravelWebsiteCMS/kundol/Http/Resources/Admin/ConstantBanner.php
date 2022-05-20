<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\SliderNavigation as SliderNavigationResource;
use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ConstantBanner extends JsonResource
{
    public function toArray($request)
    {
        if (\Request::route()->getName() == 'client.banner.index' || \Request::route()->getName() == 'client.banner.show') {
            return [
                'banner_id' => $this->id,
                'banner_title' => $this->title,
                'banner_number' => $this->banner_number,
                'banner_status' => $this->status,
                'banner_url' => $this->url,
                'gallary' => isset($this->gallary->name) ? $this->gallary->name : '',
                'language' => isset($this->language->id) ? $this->language->id : '',
            ];
        }
        return [
            'banner_id' => $this->id,
            'banner_title' => $this->title,
            'banner_title' => $this->title,
            'banner_number' => $this->banner_number,
            'banner_status' => $this->status,
            'banner_url' => $this->url,
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
            'language' => new LanguageResource($this->whenLoaded('language')),
        ];
    }
}
