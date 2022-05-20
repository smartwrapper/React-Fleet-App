<?php

namespace App\Repository\Admin;

use App\Contract\Admin\TaxInterface;
use App\Http\Resources\Admin\Tax as TaxResource;
use App\Models\Admin\Product;
use App\Models\Admin\Tax;
use App\Models\Admin\TaxRate;
use App\Services\Admin\AccountService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class TaxRepository implements TaxInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $tax = new Tax;
            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                return $this->successResponse(TaxResource::collection($tax->get()), 'Data Get Successfully!');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $tax = $tax->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id', 'title'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $tax = $tax->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(TaxResource::collection($tax->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($tax)
    {
        try {

            return $this->successResponse(new TaxResource($tax), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Tax;
            $sql = $sql->create($parms);
            // $accounts = new AccountService;
            // $accounts->createAccount('tax', $parms['title'], $sql->id);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new TaxResource($sql), 'Tax Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $tax)
    {
        try {
            $tax->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($tax) {
            return $this->successResponse(new TaxResource($tax), 'Tax Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($tax)
    {

        $isExistedInProduct = Product::where('tax_id','=',$tax)->count();
        $isExistedInTaxRate = TaxRate::where('tax_id','=',$tax)->count();
        if($isExistedInProduct > 0 ||  $isExistedInTaxRate  > 0){
        return $this->errorResponse('linked in another table can not be deleted',422,null);
        }
        
        try {
            $sql = Tax::findorFail($tax);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Tax Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
