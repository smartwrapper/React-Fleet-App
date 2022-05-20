<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\BlogCategoryDetail as BlogCategoryDetailResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Models\Admin\Gallary;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogCategory extends JsonResource
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
            'blog_category_id' => $this->id,
            'blog_category_gallary_id' => new GallaryResource($this->whenLoaded('gallary')),
            'blog_category_status' => $this->status,
            'blog_category_created_by' => $this->created_by,
            'blog_category_updated_by' => $this->updated_by,
            'blog_category_slug' => $this->blog_category_slug,
            'blog_gallary' => new GallaryResource(Gallary::with('detail')->find($this->gallary_id)),
            'blog_detail' => BlogCategoryDetailResource::collection($this->whenLoaded('blogCategoryDetail')),
        ];
    }
}
