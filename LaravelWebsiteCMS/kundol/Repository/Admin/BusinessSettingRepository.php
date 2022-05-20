<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BusinessSettingInterface;
use App\Http\Resources\Admin\BusinessSetting as BusinessSettingResource;
use App\Models\Admin\BusinessSetting;
use App\Traits\ApiResponser;
use DB;

class BusinessSettingRepository implements BusinessSettingInterface
{
    use ApiResponser;

    public function show($businessSettingId)
    {
        try {
            $businessSetting = new BusinessSetting;

            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $businessSetting = $businessSetting->with('gallary');
            }
            if (isset($_GET['getTimezone']) && $_GET['getTimezone'] == '1') {
                $businessSetting = $businessSetting->with('timezone');
            }
            return $this->successResponse(new BusinessSettingResource($businessSetting->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        $businessSetting = BusinessSetting::first();
        try {
            if ($businessSetting) {
                $sql = tap($businessSetting)->update($parms);
            } else {
                $sql = new BusinessSetting;
                $sql = $sql->create($parms);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new BusinessSettingResource($sql), 'Business Setting Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
