<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BillerInterface;
use App\Http\Resources\Admin\Biller as BillerResource;
use App\Models\Admin\Biller;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class BillerRepository implements BillerInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $biller = new Biller;
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $biller = $biller->with('gallary');
            }
            if (isset($_GET['getCountry']) && $_GET['getCountry'] == '1') {
                $biller = $biller->with('country');
            }
            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                $biller = $biller->with('state');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $biller = $biller->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id', 'name', 'company_name', 'vat_number', 'email', 'phone_number', 'address', 'city'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $biller = $biller->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(BillerResource::collection($biller->paginate($numOfResult)) , 'Data Get Successfully!');

        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($biller)
    {
        try {
            return $this->successResponse(new BillerResource($biller) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Biller;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new BillerResource($sql), 'Biller Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $biller)
    {

        try {
            $biller->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($biller) {
            return $this->successResponse(new BillerResource($biller), 'Biller Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($biller)
    {
        try {
            $sql = Biller::findOrFail($biller);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Biller Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
