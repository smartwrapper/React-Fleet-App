<?php

namespace App\Repository\Admin;

use App\Contract\Admin\WarehouseInterface;
use App\Http\Resources\Admin\Warehouse as WarehouseResource;
use App\Models\Admin\UserWarehouse;
use App\Models\Admin\Warehouse;
use App\Traits\ApiResponser;
use App\Services\Admin\DeleteValidatorService;


class WarehouseRepository implements WarehouseInterface
{
    use ApiResponser;
    public function all()
    {

        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $warehouse = new Warehouse;
            if(\Auth::user()->role->id != 1 ){
                $userWareHouses = UserWarehouse::where('user_id',\Auth::id())->pluck('warehouse_id');
                $warehouse = $warehouse->whereIn('id',$userWareHouses);
            }
            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                return $this->successResponse(WarehouseResource::collection($warehouse->get()), 'Data Get Successfully!');
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $warehouse = $warehouse->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $warehouse = $warehouse->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            
            

            return $this->successResponse(WarehouseResource::collection($warehouse->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($warehouse)
    {
        try {
            return $this->successResponse(new WarehouseResource($warehouse) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Warehouse;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new WarehouseResource($sql), 'Warehouse Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $warehouse)
    {
        try {
            $warehouse->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($warehouse) {
            return $this->successResponse(new WarehouseResource($warehouse), 'Warehouse Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($warehouse)
    {
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('warehouse_id', $warehouse);
        
        if($isExistedInOtherTable === 1){
            return $this->errorResponse('linked in another table can not be deleted',422,null);
        }
        try {
            $sql = Warehouse::findOrFail($warehouse);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Warehouse Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
