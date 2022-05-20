<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\HomeBannerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\HomeBannerRequest;
use App\Models\Admin\HomeBanner;
use App\Repository\Admin\HomeBannerRepository;

class HomeBannerController extends Controller
{
    private $HomeBannerRepository;

    public function __construct(HomeBannerInterface $HomeBannerRepository)
    {
        $this->HomeBannerRepository = $HomeBannerRepository;
    }

    public function index()
    {
        return $this->HomeBannerRepository->all();
    }

    public function show(HomeBanner $HomeBanner)
    {
        return $this->HomeBannerRepository->show($HomeBanner);
    }

    public function store(HomeBannerRequest $request)
    {
        $parms = $request->all();
        return $this->HomeBannerRepository->store($parms);
    }

    public function update(HomeBannerRequest $request, HomeBanner $HomeBanner)
    {

        $parms = $request->all();
        return $this->HomeBannerRepository->update($parms, $HomeBanner);
    }

    public function destroy($id)
    {
        return $this->HomeBannerRepository->destroy($id);
    }

}
