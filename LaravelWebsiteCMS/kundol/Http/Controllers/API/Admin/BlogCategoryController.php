<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BlogCategoryInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\Admin\BlogCategory;
use App\Repository\Admin\BlogCategoryRepository;

class BlogCategoryController extends Controller
{
    private $BlogCategoryRepository;

    public function __construct(BlogCategoryInterface $BlogCategoryRepository)
    {
        $this->BlogCategoryRepository = $BlogCategoryRepository;
    }

    public function index()
    {
        return $this->BlogCategoryRepository->all();
    }

    public function show(BlogCategory $blogCategory)
    {
        return $this->BlogCategoryRepository->show($blogCategory);
    }

    public function store(BlogCategoryRequest $request)
    {
        $parms = $request->all();
        return $this->BlogCategoryRepository->store($parms);
    }

    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $parms = $request->all();
        return $this->BlogCategoryRepository->update($parms, $blogCategory);
    }

    public function destroy($id)
    {
        return $this->BlogCategoryRepository->destroy($id);
    }

}
