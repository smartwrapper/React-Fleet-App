<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\SettingInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Admin\Setting;
use App\Repository\Admin\SettingRepository;
use App\Traits\ApiResponser;

class SettingController extends Controller
{
    private $SettingRepository;
    use ApiResponser;

    public function __construct(SettingInterface $SettingRepository)
    {
        $this->SettingRepository = $SettingRepository;
    }

    public function index()
    {
        return $this->SettingRepository->all();
    }
    public function update(SettingRequest $request, $type)
    {
        Setting::where('type', $type)->firstOrFail();
        if (!isset($request->key)) {
            return $this->errorResponse('Key is required');
        }

        $parms = $request->all();
        return $this->SettingRepository->update($parms, $type);
    }

}
