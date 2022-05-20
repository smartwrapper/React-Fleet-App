<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BannerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Admin\Banner;
use App\Repository\Admin\BannerRepository;

class BannerController extends Controller
{
    private $bannerRepository;

    public function __construct(BannerInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function index()
    {
        return $this->bannerRepository->all();
    }

    public function show(Banner $Banner)
    {
        return $this->bannerRepository->show($Banner);
    }

    public function store(BannerRequest $request)
    {
        $parms = $request->all();
        return $this->bannerRepository->store($parms);
    }

    public function update(BannerRequest $request, Banner $Banner)
    {
        $parms = $request->all();
        return $this->bannerRepository->update($parms, $Banner);
    }

    public function destroy($id)
    {
        return $this->bannerRepository->destroy($id);
    }

}
