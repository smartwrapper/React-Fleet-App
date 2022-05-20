<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CurrencyInterface;
use App\Http\Resources\Admin\Currency as CurrencyResource;
use App\Models\Admin\Currency;
use App\Services\Admin\CurrencyService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;
use App\Services\Admin\DeleteValidatorService;


class CurrencyRepository implements CurrencyInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            if (isset($_GET['is_default']) && $_GET['is_default'] === '1') {
                // return new CurrencyResource(Currency::defaultCurrency()->firstOrFail());
                return $this->successResponse(new CurrencyResource(Currency::defaultCurrency()->firstOrFail()), 'Data Get Successfully!');
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            
            $currency = new Currency;
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $currency = $currency->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id','title','symbol_position','code','value','is_default'];
            $sortType = ['ASC','DESC','asc','desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'],$sortBy) && in_array($_GET['sortType'],$sortType)) {
                $currency = $currency->orderBy($_GET['sortBy'],$_GET['sortType']);
            }

            return $this->successResponse(CurrencyResource::collection($currency->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($currency)
    {
        try {
            return $this->successResponse(new CurrencyResource($currency) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        if (isset($parms['is_default']) && $parms['is_default'] == '1') {
            $currencyService = new CurrencyService;
            $currencyService->resetDefualtCurrency();
        }
        try {
            $sql = new Currency;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'msg' => 'Internal Server Error!'], 422);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new CurrencyResource($sql), 'Currency Save Successfully!');
        }
    }

    public function update(array $parms, $currency)
    {

        DB::beginTransaction();
        if (isset($parms['is_default']) && $parms['is_default'] == '1') {
            $currencyService = new CurrencyService;
            $currencyService->resetDefualtCurrency($currency->id);
        }

        try {
            $currency->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($currency) {
            DB::commit();
            return $this->successResponse(new CurrencyResource($currency), 'Currency Update Successfully!');
        }
    }

    public function destroy($Currency)
    {

        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('currency_id', $Currency);
        
        if($isExistedInOtherTable === 1){
            return $this->errorResponse('linked in another table can not be deleted',422,null);
        }

        
        try {
            $sql = Currency::findOrFail($Currency);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Currency Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }


    public function isDefault(array $parms)
    {
        if(!isset($parms['is_default']) || !isset($parms['id'])){
            return $this->errorResponse('is_default and id is required!');
        }
        DB::beginTransaction();
        $sql = Currency::findOrFail($parms['id']);

        if (isset($parms['is_default']) && $parms['is_default'] == '1') {
            $currencyService = new CurrencyService;
            $currencyService->resetDefualtCurrency($sql->id);
        }

        try {
            $sql->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new CurrencyResource($sql), 'Currency Update Successfully!');
        }
    }

}
