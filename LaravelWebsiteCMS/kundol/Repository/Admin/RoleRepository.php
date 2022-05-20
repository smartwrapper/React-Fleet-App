<?php

namespace App\Repository\Admin;

use App\Contract\Admin\RoleInterface;
use App\Http\Resources\Admin\Role as RoleResource;
use App\Models\Admin\Role;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class RoleRepository implements RoleInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $role = new Role;

            $sortBy = ['id','first_name','last_name','email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $role = $role->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $role = $role->searchParameter($_GET['searchParameter']);
            }
            return $this->successResponse(RoleResource::collection($role->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($role)
    {
        try {
            return $this->successResponse(new RoleResource($role) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Role;
            $sql = $sql->create($parms);

        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new RoleResource($sql), 'Role Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $role)
    {
        try {
            $role->update($parms);

        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($role) {
            return $this->successResponse(new RoleResource($role), 'Role Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($role)
    {
        try {
            $sql = Role::findOrFail($role);
            $sql->delete();

        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Role Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
