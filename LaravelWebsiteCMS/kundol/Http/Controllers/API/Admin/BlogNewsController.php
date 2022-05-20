<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BlogNewsInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BlogNewsRequest;
use App\Models\Admin\BlogNews;
use App\Repository\Admin\BlogNewsRepository;

class BlogNewsController extends Controller
{
    private $BlogNewsRepository;

    public function __construct(BlogNewsInterface $BlogNewsRepository)
    {
        $this->BlogNewsRepository = $BlogNewsRepository;
    }

    public function index()
    {
        return $this->BlogNewsRepository->all();
    }

    public function show(BlogNews $blogNews)
    {
        return $this->BlogNewsRepository->show($blogNews);
    }

    public function store(BlogNewsRequest $request)
    {
        $parms = $request->all();
        return $this->BlogNewsRepository->store($parms);
    }

    public function update(BlogNewsRequest $request, BlogNews $blogNews)
    {
        $parms = $request->all();
        return $this->BlogNewsRepository->update($parms, $blogNews);
    }

    public function destroy($id)
    {
        return $this->BlogNewsRepository->destroy($id);
    }

}
