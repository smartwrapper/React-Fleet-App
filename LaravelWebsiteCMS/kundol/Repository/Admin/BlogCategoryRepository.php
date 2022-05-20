<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BlogCategoryInterface;
use App\Http\Resources\Admin\BlogCategory as BlogCategoryResource;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\Language;
use App\Services\Admin\BlogCategoryDetailService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class BlogCategoryRepository implements BlogCategoryInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $blogCategory = new BlogCategory;
            if (isset($_GET['getGallaryDetail']) && $_GET['getGallaryDetail'] == '1') {
                $blogCategory = $blogCategory->with('gallary');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id', 'status'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $blogCategory = $blogCategory->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $blogCategory = $blogCategory->searchParameter($_GET['searchParameter']);
            }

            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '')
                $languageId = Language::languageId($_GET['language_id'])->value('id');

            $sortBy = ['name'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $blogCategory = $blogCategory->getBlogCategoryDetail($languageId);
                $blogSortType = $blogSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $blogSortType = $_GET['sortType'];
                    $blogSortBy = $_GET['sortBy'];
                    $blogCategory = $blogCategory->sortByCategoryDetail($blogSortBy, $blogSortType,$languageId);
                }
            }
            return $this->successResponse(BlogCategoryResource::collection($blogCategory->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($blogCategory)
    {
        try {
            $blogCategory = BlogCategory::blogCategoryId($blogCategory->id);
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $blogCategory = $blogCategory->with('blogCategoryDetail');
            }
            if (isset($_GET['getGallaryDetail']) && $_GET['getGallaryDetail'] == '1') {
                $blogCategory = $blogCategory->with('gallary');
            }
            
            return $this->successResponse(new BlogCategoryResource($blogCategory->first()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $parms['created_by'] = \Auth::id();
            $sql = BlogCategory::create($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
        if ($sql) {
            $blogCategoryDetailService = new BlogCategoryDetailService;
            $result = $blogCategoryDetailService->store($parms, $sql->id);
        }

        if ($result) {
            DB::commit();
            return $this->successResponse(new BlogCategoryResource($sql), 'Blog Category Save Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $blogCategory)
    {
        DB::beginTransaction();
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $blogCategory->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($blogCategory) {
            $blogCategoryDetailService = new BlogCategoryDetailService;
            $sql = $blogCategoryDetailService->update($parms, $blogCategory->id);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new BlogCategoryResource($blogCategory), 'Blog Category Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($blogCategory)
    {
        try {
            $sql = BlogCategory::findOrFail($blogCategory);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Blog Category Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
