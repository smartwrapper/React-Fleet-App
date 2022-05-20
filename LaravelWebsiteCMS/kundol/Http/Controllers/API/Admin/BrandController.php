<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BrandInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Admin\Brand;
use App\Repository\Admin\BrandRepository;

class BrandController extends Controller
{
    private $BrandRepository;

    public function __construct(BrandInterface $BrandRepository)
    {
        $this->BrandRepository = $BrandRepository;
    }

    public function index()
    {
        return $this->BrandRepository->all();
    }

    public function show(Brand $brand)
    {
        return $this->BrandRepository->show($brand);
    }

    public function store(BrandRequest $request)
    {
        $parms = $request->all();
        return $this->BrandRepository->store($parms);
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $parms = $request->all();
        return $this->BrandRepository->update($parms, $brand);
    }

    public function destroy($id)
    {
        return $this->BrandRepository->destroy($id);
    }

}
