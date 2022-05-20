<?php

namespace App\Repository\Admin;

use App\Contract\Admin\PageInterface;
use App\Http\Resources\Admin\Page as PageResource;
use App\Models\Admin\Page;
use App\Models\Admin\PageDetail;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;
use DB;

class PageRepository implements PageInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $page = new Page;
            if (isset($_GET['getDetailWithLanguage']) && $_GET['getDetailWithLanguage'] == '1') {
                $page = $page->with('page_detail.language');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $page = $page->searchParameter($_GET['searchParameter']);
            }
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $languageId = Language::defaultLanguage()->value('id');
                $languageId = Language::languageId($_GET['language_id'])->value('id');
                $page = $page->getPageDetailByLanguageId($languageId);
            }

            $sortBy = ['id','slug'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $page = $page->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            $sortBy = ['title'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $pageSortType = $pageSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $pageSortType = $_GET['sortType'];
                    $pageSortBy = $_GET['sortBy'];
                    $page = $page->sortByPageDetail($pageSortBy, $pageSortType, $languageId);
                }
            }

            return $this->successResponse(PageResource::collection($page->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($page)
    {
        $page = Page::pageId($page->id);
        try {
            if (\Request::route()->getName() == 'pages.show') {
                $languageId = Language::defaultLanguage()->value('id');
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $languageId = Language::languageId($_GET['language_id'])->value('id');
                }
                $page = $page->getPageDetailByLanguageId($languageId);
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $page = $page->with(['page_detail', 'page_detail.language']);
            }

            return $this->successResponse(new PageResource($page->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $sql = new Page;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        foreach ($parms['title'] as $i => $name) {
            PageDetail::create([
                'title' => $name,
                'description' => $parms['description'][$i],
                'language_id' => $parms['language_id'][$i],
                'page_id' => $sql->id,
            ]);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new PageResource($sql), 'Page Save Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $page)
    {
        // return $parms;
        DB::beginTransaction();
        try {
            $page->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        try {
            PageDetail::where('page_id', $page->id)->delete();
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        foreach ($parms['title'] as $i => $name) {
            PageDetail::create([
                'title' => $name,
                'description' => $parms['description'][$i],
                'language_id' => $parms['language_id'][$i],
                'page_id' => $page->id,
            ]);
        }
        if ($page) {
            DB::commit();
            return $this->successResponse(new PageResource($page), 'Page Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($page)
    {
        try {
            $sql = Page::findOrFail($page);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Page Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
