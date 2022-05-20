<?php

namespace App\Services\Admin;

use App\Models\Admin\UnitDetail;
use App\Traits\ApiResponser;
use DB;

class UnitDetailService
{
    use ApiResponser;
    public function store($parms, $unitId)
    {
        foreach ($parms['language_id'] as $i => $data) {

            $arr['language_id'] = $parms['language_id'][$i];
            $arr['name'] = $parms['name'][$i];

            try {
                $arr['unit_id'] = $unitId;
                $query = new UnitDetail;
                $query->create($arr);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse('Some thing went Wrong! Please try Again.', 401);
            }
        }
        return 1;
    }

    public function update($parms, $unitId)
    {
        $arr['unit_id'] = $unitId;
        $query = UnitDetail::where('unit_id', $unitId)->delete();
        foreach ($parms['language_id'] as $i => $data) {
            $arr['language_id'] = $parms['language_id'][$i];
            $arr['name'] = $parms['name'][$i];
            try {
                $query = new UnitDetail;
                $query->create($arr);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse('Some thing went Wrong! Please try Again.', 401);
            }
        }
        return 1;
    }
}
