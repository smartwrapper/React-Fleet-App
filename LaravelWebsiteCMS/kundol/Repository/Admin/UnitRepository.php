<?php

namespace App\Repository\Admin;

use App\Contract\Admin\UnitInterface;
use App\Http\Resources\Admin\Unit as UnitResource;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Models\Admin\Unit;
use App\Services\Admin\DeleteValidatorService;
use App\Services\Admin\UnitDetailService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class UnitRepository implements UnitInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $unit = new Unit;
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $languageId = Language::defaultLanguage()->value('id');
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstOrFail();
                    $languageId = $language->id;
                }
                $unit = $unit->GetUnitDetailByLanguageId($languageId);
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $unit = $unit->searchParameter($_GET['searchParameter']);
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $unit = $unit->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            $sortBy = ['name','is_active'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $unitSortType = $unitSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $unitSortType = $_GET['sortType'];
                    $unitSortBy = $_GET['sortBy'];
                    $unit = $unit->sortByUnitDetail($unitSortBy, $unitSortType, $languageId);
                }
            }
            return $this->successResponse(UnitResource::collection($unit->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($unit)
    {
        try {
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                return $this->successResponse(new UnitResource(Unit::with('detail')->unitId($unit->id)->firstOrFail()), 'Data Get Successfully!');
            }

            return $this->successResponse(new UnitResource($unit), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        \DB::beginTransaction();
        if (isset($parms['is_active'])) {
            $single['is_active'] = $parms['is_active'];
        } else {
            $single['is_active'] = 1;
        }
        try {
            $single['created_by'] = \Auth::id();
            $sql = Unit::create($single);
        } catch (Exception $e) {
            \DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            $unitDetailService = new UnitDetailService;
            $result = $unitDetailService->store($parms, $sql->id);
        }

        if ($result) {
            \DB::commit();
            return $this->successResponse(new UnitResource($sql), 'Unit Save Successfully!');
        } else {
            \DB::rollback();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $unit)
    {
        // return $parms;
        \DB::beginTransaction();
        if (isset($parms['is_active'])) {
            $single['is_active'] = $parms['is_active'];
        } else {
            $single['is_active'] = 1;
        }
        try {
            $single['updated_by'] = \Auth::id();
            $unit->update($single);
            if ($unit) {
                $unitDetailService = new UnitDetailService;
                $result = $unitDetailService->update($parms, $unit->id);
            }
        } catch (Exception $e) {
            \DB::rollback();
            return $this->errorResponse();
        }


        if ($result) {
            \DB::commit();
            return $this->successResponse(new UnitResource($unit), 'Unit Update Successfully!');
        } else {
            \DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($unit)
    {
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('unit_id', $unit);

        if ($isExistedInOtherTable === 1) {
            return $this->errorResponse('linked in another table can not be deleted', 422, null);
        }

        try {
            $sql = Unit::findOrFail($unit);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Unit Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
