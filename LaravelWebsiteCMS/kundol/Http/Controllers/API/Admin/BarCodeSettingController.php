<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BarCodeSettingInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BarCodeSettingRequest;
use App\Models\Admin\BarCodeSetting;
use App\Repository\Admin\BarCodeSettingRepository;

class BarCodeSettingController extends Controller
{
    private $BarCodeSettingRepository;

    public function __construct(BarCodeSettingInterface $BarCodeSettingRepository)
    {
        $this->BarCodeSettingRepository = $BarCodeSettingRepository;
    }

    public function index()
    {
        return $this->BarCodeSettingRepository->all();
    }

    public function show(BarCodeSetting $BarCodeSetting)
    {
        return $this->BarCodeSettingRepository->show($BarCodeSetting);
    }

    public function store(BarCodeSettingRequest $request)
    {
        $parms = $request->all();
        return $this->BarCodeSettingRepository->store($parms);
    }

    public function update(BarCodeSettingRequest $request, BarCodeSetting $BarCodeSetting)
    {
        $parms = $request->all();
        return $this->BarCodeSettingRepository->update($parms, $BarCodeSetting);
    }

    public function destroy($id)
    {
        return $this->BarCodeSettingRepository->destroy($id);
    }

}
