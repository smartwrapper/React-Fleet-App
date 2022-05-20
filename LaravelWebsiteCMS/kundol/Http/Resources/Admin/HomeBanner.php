<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\SliderNavigation as SliderNavigationResource;
use App\Http\Resources\Admin\Language as LanguageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeBanner extends JsonResource
{
    public function toArray($request)
    {
       
        return [
            'banner_id' => $this->id,
            'banner_name' => $this->banner_name,
            'content' => $this->content,
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
            'language' =>$this->language_id,
        ];
    }
}
