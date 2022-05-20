<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BlogNewsInterface;
use App\Http\Resources\Admin\BlogNews as BlogNewsResource;
use App\Models\Admin\BlogNews;
use App\Models\Admin\Language;
use App\Services\Admin\BlogNewsDetailService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class BlogNewsRepository implements BlogNewsInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $blogNews = new BlogNews;
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $languageId = Language::languageId($_GET['language_id'])->value('id');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $languageId = Language::defaultLanguage()->value('id');
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstOrFail();
                    $languageId = $language->id;
                }
                $blogNews = $blogNews->getBlogDetailByLanguageId($languageId);
            }
            if (isset($_GET['getGallaryDetail']) && $_GET['getGallaryDetail'] == '1') {
                $blogNews = $blogNews->with('gallary')->with('gallary.detail')->getBlogDetailByLanguageId($languageId);
            }
            if (isset($_GET['getBlogCategory']) && $_GET['getBlogCategory'] == '1') {
                $blogNews = $blogNews->with('blogCategory')->GetBlogCategoryDetailByLanguageId($languageId);
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $blogNews = $blogNews->searchParameter($_GET['searchParameter']);
            }

            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $languageId = Language::languageId($_GET['language_id'])->value('id');
            }
            $blogNews = $blogNews->getBlogDetailByLanguageId($languageId);

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $blogNews = $blogNews->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            $sortBy = ['name','is_featured'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $blogNewsSortType = $blogNewsSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $blogNewsSortType = $_GET['sortType'];
                    $blogNewsSortBy = $_GET['sortBy'];
                    $blogNews = $blogNews->sortByBlogNewsDetail($blogNewsSortBy, $blogNewsSortType, $languageId);
                }
            }
            if (isset($_GET['slug'])) {
                $blogNews = $blogNews->where('slug', $_GET['slug']);
            }
            if (isset($_GET['is_featured']) && $_GET['is_featured'] == 1) {
                $blogNews = $blogNews->where('is_featured', 1);
            }

            if (isset($_GET['category_slug'])) {
                $blogCategorySlug = $_GET['category_slug'];

                $blogNews = $blogNews->whereHas('blogCategory', function ($query) use ($blogCategorySlug) {
                    $query->where('blog_categories.blog_category_slug', $blogCategorySlug);
                });
            }
            return $this->successResponse(BlogNewsResource::collection($blogNews->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($blogNews)
    {
        try {
            $blogNews = BlogNews::blogNewsId($blogNews->id);
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $blogNews = $blogNews->with('blogNewsDetail.language');
            }
            if (isset($_GET['getGallaryDetail']) && $_GET['getGallaryDetail'] == '1') {
                $blogNews = $blogNews->with('gallary');
            }
            if (isset($_GET['getBlogCategory']) && $_GET['getBlogCategory'] == '1') {
                $blogNews = $blogNews->with('blogCategory');
            }

            return $this->successResponse(new BlogNewsResource($blogNews->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $parms['created_by'] = \Auth::id();
            $sql = BlogNews::create($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
        if ($sql) {
            $blogNewsDetailService = new BlogNewsDetailService;
            $result = $blogNewsDetailService->store($parms, $sql->id);
        }

        if ($result) {
            DB::commit();
            return $this->successResponse(new BlogNewsResource($sql), 'Blog News Save Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $blogNews)
    {
        DB::beginTransaction();
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $blogNews->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($blogNews) {
            $blogNewsDetailService = new BlogNewsDetailService;
            $sql = $blogNewsDetailService->update($parms, $blogNews->id);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new BlogNewsResource($blogNews), 'Blog News Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($blogNews)
    {
        try {
            $sql = BlogNews::findOrFail($blogNews);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Blog News Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
