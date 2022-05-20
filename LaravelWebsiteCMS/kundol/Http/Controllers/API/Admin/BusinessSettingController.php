<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BusinessSettingInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BusinessSettingRequest;
use App\Repository\Admin\BusinessSettingRepository;

class BusinessSettingController extends Controller
{
    private $businessSettingRepository;

    public function __construct(BusinessSettingInterface $businessSettingRepository)
    {
        $this->BusinessSettingRepository = $businessSettingRepository;
    }

    public function show($businessSetting)
    {
        return $this->BusinessSettingRepository->show($businessSetting);
    }

    public function store(BusinessSettingRequest $request)
    {
        $parms = $request->all();
        return $this->BusinessSettingRepository->store($parms);
    }

}
