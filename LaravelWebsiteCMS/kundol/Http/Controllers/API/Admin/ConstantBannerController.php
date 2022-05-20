<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\ConstantBannerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ConstantBannerRequest;
use App\Models\Admin\ConstantBanner;
use App\Repository\Admin\ConstantBannerRepository;

class ConstantBannerController extends Controller
{
    private $ConstantBannerRepository;

    public function __construct(ConstantBannerInterface $ConstantBannerRepository)
    {
        $this->ConstantBannerRepository = $ConstantBannerRepository;
    }

    public function index()
    {
        return $this->ConstantBannerRepository->all();
    }

    public function show(ConstantBanner $ConstantBanner)
    {
        return $this->ConstantBannerRepository->show($ConstantBanner);
    }

    public function store(ConstantBannerRequest $request)
    {
        $parms = $request->all();
        return $this->ConstantBannerRepository->store($parms);
    }

    public function update(ConstantBannerRequest $request, ConstantBanner $ConstantBanner)
    {
        $parms = $request->all();
        return $this->ConstantBannerRepository->update($parms, $ConstantBanner);
    }

    public function destroy($id)
    {
        return $this->ConstantBannerRepository->destroy($id);
    }

}
