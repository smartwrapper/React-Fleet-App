<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\GallaryInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\GallaryDeleteRequest;
use App\Http\Requests\GallaryRequest;
use App\Http\Requests\GallaryTagRequest;
use App\Http\Requests\SingleGallaryRequest;
use App\Models\Admin\Gallary;

class GallaryController extends Controller
{
    private $gallaryRepository;

    public function __construct(GallaryInterface $gallaryRepository)
    {
        $this->gallaryRepository = $gallaryRepository;
    }

    public function index()
    {
        return $this->gallaryRepository->all();
    }

    public function show($gallary)
    {
        return $this->gallaryRepository->show($gallary);
    }

    public function store(GallaryRequest $request)
    {
        return $this->gallaryRepository->store($request->file('file'), $request->all());
    }

    public function update(GallaryTagRequest $request, Gallary $gallary)
    {
        return $this->gallaryRepository->update($request->all(), $gallary);
    }

    public function destroy(GallaryDeleteRequest $request)
    {
        return $this->gallaryRepository->destroy($request->id);
    }

    public function resizeSingleImage(SingleGallaryRequest $request)
    {
        return $this->gallaryRepository->resizeSingleImage($request->all());
    }

    public function regenrateAllImages()
    {
        return $this->gallaryRepository->regenrateAllImages();
    }
}
