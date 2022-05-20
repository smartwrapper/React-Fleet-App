<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CategoryInterface;
use App\Http\Resources\Admin\Category as CategoryResource;
use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Services\Admin\CategoryDetailService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $category = new Category;

            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $category = $category->with('gallary')->with('icon');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $category = $category->searchParameter($_GET['searchParameter']);
            }

            if (\Request::route()->getName() == 'client.category.index') {
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstORFail();
                    $languageId = $language->id;
                } else {
                    $languageId = Language::defaultLanguage()->value('id');
                }
                $category = $category->getCategoryByLanguageId($languageId);
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $category = $category->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            $sortBy = ['category_name'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {

                $languageId = Language::defaultLanguage()->value('id');
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstOrFail();
                    $languageId = $language->id;
                }
                $categorySortType = $categorySortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $categorySortType = $_GET['sortType'];
                    $categorySortBy = $_GET['sortBy'];
                }
                if ($categorySortType && $categorySortBy)
                    $category = $category->getCategoryDetailByLanguageId($languageId, $categorySortBy, $categorySortType);
                $category = $category->getCategoryByLanguageId($languageId);

                $category = $category->getCategoryParentByLanguageId($languageId);
            }
            // return $category->get();
            
            return $this->successResponse(CategoryResource::collection($category->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($category)
    {
        try {
            $category = Category::categoryId($category->id);
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $category = $category->with('detail');
            }
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $category = $category->with('gallary')->with('icon');
            }
            if (\Request::route()->getName() == 'client.category.show') {
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstORFail();
                    $languageId = $language->id;
                } else {
                    $languageId = Language::defaultLanguage()->value('id');
                }
                $category = $category->getCategoryByLanguageId($languageId);
            }
            
            return $this->successResponse(new CategoryResource($category->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $parms['created_by'] = \Auth::id();

            $sql = Category::create($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
        if ($sql) {
            $categoryDetailService = new CategoryDetailService;
            $result = $categoryDetailService->store($parms, $sql->id);
        }

        if ($result) {
            DB::commit();
            return $this->successResponse(new CategoryResource($sql), 'Category Save Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $category)
    {
        DB::beginTransaction();
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $category->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($category) {
            $categoryDetailService = new CategoryDetailService;
            $sql = $categoryDetailService->update($parms, $category->id);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new CategoryResource($category), 'Category Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($Category)
    {
        $isExistedInProduct = Product::whereHas('category',function($query) use ($Category){
            return $query->where('product_category.category_id',$Category);
        })->count();
        if($isExistedInProduct > 0 ){
            return $this->errorResponse('linked in another table can not be deleted',422,null);
        }


        try {
            $sql = Category::findOrFail($Category);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Category Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
