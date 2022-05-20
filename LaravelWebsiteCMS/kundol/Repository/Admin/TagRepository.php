<?php

namespace App\Repository\Admin;

use App\Contract\Admin\TagInterface;
use App\Http\Resources\Admin\Tag as TagResource;
use App\Models\Admin\Tag;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class TagRepository implements TagInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $tag = new Tag;
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $tag = $tag->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $tag = $tag->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(TagResource::collection($tag->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }
}
