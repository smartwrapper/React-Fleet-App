<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\BlogCategory as BlogCategoryResource;
use App\Http\Resources\Admin\BlogNewsDetail as BlogNewsDetailResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogNews extends JsonResource
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
            'blog_id' => $this->id,
            'gallary' => new GallaryResource($this->whenLoaded('gallary')),
            'category' => new BlogCategoryResource($this->whenLoaded('blogCategory')),
            'detail' => BlogNewsDetailResource::collection($this->whenLoaded('blogNewsDetail')),
            'blog_status' => $this->status,
            'is_featured' => $this->is_featured,
            'slug' => $this->slug,
            'views' => $this->views,
            'blog_created_by' => $this->created_by,
            'blog_updated_by' => $this->updated_by,
            'date' => date('d-M-Y', strtotime($this->created_at)),
        ];
    }
}
