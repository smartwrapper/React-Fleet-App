<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CountryInterface;
use App\Http\Resources\Admin\Country as CountryResource;
use App\Models\Admin\Country;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class CountryRepository implements CountryInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $country = new Country;
            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                return $this->successResponse(CountryResource::collection($country->get()), 'Data Get Successfully!');
            }
            if (isset($_GET['getStates']) && $_GET['getStates'] == '1') {
                $country = $country->with('states');
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $country = $country->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $country = $country->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(CountryResource::collection($country->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('', 422);
        }
    }

    public function show($country)
    {
        try {
            if (isset($_GET['getStates']) && $_GET['getStates'] == '1') {
                return $this->successResponse(new CountryResource(Country::with('states')->countryId($country->id)->firstOrFail()), 'Data Get Successfully!');
            }

            return $this->successResponse(new CountryResource($country), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('', 422);
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Country;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new CountryResource($sql), 'Country Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $country)
    {
        // return $parms;
        try {
            $country->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($country) {
            return $this->successResponse(new CountryResource($country), 'Country Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($country)
    {
        try {
            $sql = Country::findOrFail($country);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Country Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
