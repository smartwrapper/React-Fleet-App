<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CategoryInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;
use App\Repository\Admin\CategoryRepository;
use App\Services\Admin\CategoryDetailService;

class CategoryController extends Controller
{
    private $CategoryRepository;
    protected $categoryDetailService;

    public function __construct(CategoryInterface $CategoryRepository, CategoryDetailService $categoryDetailService)
    {
        $this->CategoryRepository = $CategoryRepository;
        $this->categoryDetailService = $categoryDetailService;
    }

    public function index()
    {
        return $this->CategoryRepository->all();
    }

    public function show(Category $category)
    {
        return $this->CategoryRepository->show($category);
    }

    public function store(CategoryRequest $request)
    {
        $parms = $request->all();
        // return $parms;
        $this->categoryDetailService->storeValidate($parms);
        return $this->CategoryRepository->store($parms);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $parms = $request->all();
        $this->categoryDetailService->updateValidate($parms);
        return $this->CategoryRepository->update($parms, $category);
    }

    public function destroy($id)
    {
        return $this->CategoryRepository->destroy($id);
    }
}
