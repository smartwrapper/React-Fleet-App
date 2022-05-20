<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BarCodeSettingInterface;
use App\Http\Resources\Admin\BarCodeSetting as BarCodeSettingResource;
use App\Models\Admin\BarCodeSetting;
use App\Traits\ApiResponser;
use DB;

class BarCodeSettingRepository implements BarCodeSettingInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $BarcCodeSetting = new BarCodeSetting;
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $BarcCodeSetting = $BarcCodeSetting->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(BarCodeSettingResource::collection($BarcCodeSetting->paginate($numOfResult)) , 'Data Get Successfully!');

        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($BarCodeSettingId)
    {
        try {
            $BarCodeSetting = new BarCodeSetting;

            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $BarCodeSetting = $BarCodeSetting->with('gallary');
            }
            if (isset($_GET['getCurrency']) && $_GET['getCurrency'] == '1') {
                $BarCodeSetting = $BarCodeSetting->with('currency');
            }
            if (isset($_GET['getTimezone']) && $_GET['getTimezone'] == '1') {
                $BarCodeSetting = $BarCodeSetting->with('timezone');
            }
            
            return $this->successResponse(new BarCodeSettingResource($BarCodeSetting->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $sql = new BarCodeSetting;
            $sql = $sql->create($parms);

        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new BarCodeSettingResource($sql), 'BarCode Setting Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $BarcCodeSetting)
    {
        DB::beginTransaction();
        try {
            $sql = $BarcCodeSetting->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new BarCodeSettingResource($BarcCodeSetting), 'BarCode Setting Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($BarCodeSetting)
    {
        try {
            $sql = BarCodeSetting::findOrFail($BarCodeSetting);
            $sql->delete();

        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'BarCode Setting Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
