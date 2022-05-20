<?php

namespace App\Repository\Admin;

use App\Contract\Admin\TaxRateInterface;
use App\Http\Resources\Admin\TaxRate as TaxRateResource;
use App\Models\Admin\TaxRate;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class TaxRateRepository implements TaxRateInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $taxRate = new TaxRate;
            if (isset($_GET['getTax']) && $_GET['getTax'] == '1') {
                $taxRate = $taxRate->with('tax');
            }
            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                $taxRate = $taxRate->with('state');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id', 'tax_rate'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $taxRate = $taxRate->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(TaxRateResource::collection($taxRate->paginate($numOfResult)), 'Data Get Successfully!');

        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($taxRate)
    {
        try {
            return $this->successResponse(new TaxRateResource($taxRate), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new TaxRate;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new TaxRateResource($sql), 'Tax Rate Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $taxRate)
    {
        try {
            $taxRate->update($parms);

        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($taxRate) {
            return $this->successResponse(new TaxRateResource($taxRate), 'Tax Rate Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($taxRate)
    {
        try {
            $sql = TaxRate::findOrFail($taxRate);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Tax Rate Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function findByState($taxRate)
    {
        try {
            $sql = TaxRate::with('tax')->findByState($taxRate)->get();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(TaxRateResource::collection($sql), 'Tax Rate Get Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
