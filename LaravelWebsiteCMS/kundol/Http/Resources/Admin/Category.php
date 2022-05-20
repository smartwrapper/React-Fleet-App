<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\CategoryDetail as CategoryDetailResource;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Models\Admin\Category as AdminCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (\Request::route()->getName() == 'client.category.index' || \Request::route()->getName() == 'client.category.show') {
            return [
                'id' => $this->id,
                'name' => isset($this->detail[0]->category_name) ? $this->detail[0]->category_name : '',
                'desc' => isset($this->detail[0]->category_name) ? $this->detail[0]->category_name : '',
                'icon' => isset($this->icon->name) ? $this->icon->name : '',
                'gallary' => isset($this->gallary->name) ? $this->gallary->name : '',
                'slug' => $this->category_slug,
                'parent' => $this->parent_id,
                'parent_name' => isset($this->parent->detail[0]->category_name) ? $this->parent->detail[0]->category_name : '',
            ];
        } else {
            return [
                'id' => $this->id,
                'gallary' => new GallaryResource($this->whenLoaded('gallary')),
                'icon' => new GallaryResource($this->whenLoaded('icon')),
                'parent_id' => $this->parent_id,
                'slug' => $this->category_slug,
                'sort_order' => $this->sort_order,
                'detail' => CategoryDetailResource::collection($this->whenLoaded('detail')),
                'parent_name' => isset($this->parent->detail[0]->category_name) ? $this->parent->detail[0]->category_name : '',
            ];
        }
    }
}
