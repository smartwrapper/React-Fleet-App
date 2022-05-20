<?php

namespace App\Repository\Admin;

use App\Contract\Admin\PurchaserInterface;
use App\Http\Resources\Admin\Purchaser as PurchaserResource;
use App\Models\Admin\Purchaser;
use App\Services\Admin\AccountService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class PurchaserRepository implements PurchaserInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $purchaser = new Purchaser;

            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                return $this->successResponse(PurchaserResource::collection($purchaser->get()), 'Data Get Successfully!');
            }

            if (isset($_GET['getCountry']) && $_GET['getCountry'] == '1') {
                $purchaser = $purchaser->with('country');
            }
            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                $purchaser = $purchaser->with('state');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id','first_name','last_name'];
            $sortType = ['ASC','DESC','asc','desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'],$sortBy) && in_array($_GET['sortType'],$sortType)) {
                $purchaser = $purchaser->orderBy($_GET['sortBy'],$_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $purchaser = $purchaser->searchParameter($_GET['searchParameter']);
            }
            
            return $this->successResponse(PurchaserResource::collection($purchaser->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($purchaser)
    {
        try {
            $purchaser = Purchaser::purchaserId($purchaser->id);
            if (isset($_GET['getCountry']) && $_GET['getCountry'] == '1') {
                $purchaser = $purchaser->with('country');
            }
            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                $purchaser = $purchaser->with('state');
            }
            
            return $this->successResponse(new PurchaserResource($purchaser->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Purchaser;
            $sql = $sql->create($parms);
            $accounts = new AccountService;
            $accounts->createAccount('VENDOR', $parms['first_name'], $sql->id);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new PurchaserResource($sql), 'Purchaser Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $purchaser)
    {
        try {
            $purchaser->update($parms);

        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($purchaser) {
            return $this->successResponse(new PurchaserResource($purchaser), 'Purchaser Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($purchaser)
    {
        try {
            $sql = Purchaser::findOrFail($purchaser);
            $sql->delete();

        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Purchaser Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
