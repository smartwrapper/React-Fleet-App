<?php

namespace App\Repository\Admin;

use App\Contract\Admin\DefaultAccountInterface;
use App\Http\Resources\Admin\DefaultAccount as DefaultAccountResource;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\DefaultAccountDetail;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class DefaultAccountRepository implements DefaultAccountInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $Defaultaccount = new DefaultAccount;
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id','type'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $Defaultaccount = $Defaultaccount->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(DefaultAccountResource::collection($Defaultaccount->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($Defaultaccount)
    {
        // return $DefaultAccount->id;
        $Defaultaccount = DefaultAccount::coaId($Defaultaccount->id);
        try {
            return $this->successResponse(new DefaultAccountResource($Defaultaccount->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            DefaultAccount::type($parms['type'])->delete();
            $sql = new DefaultAccount;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new DefaultAccountResource($sql), 'DefaultAccount Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $Defaultaccount)
    {
        try {
            $Defaultaccount->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($Defaultaccount) {
            return $this->successResponse(new DefaultAccountResource($Defaultaccount), 'DefaultAccount Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($Defaultaccount)
    {
        try {
            $sql = DefaultAccount::findOrFail($Defaultaccount);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'DefaultAccount Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
