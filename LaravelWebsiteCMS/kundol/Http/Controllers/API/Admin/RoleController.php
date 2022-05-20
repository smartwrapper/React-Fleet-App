<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\RoleInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Admin\Role;
use App\Repository\Admin\RoleRepository;

class RoleController extends Controller
{

    private $RoleRepository;

    public function __construct(RoleInterface $RoleRepository)
    {
        $this->RoleRepository = $RoleRepository;
    }

    public function index()
    {
        return $this->RoleRepository->all();
    }

    public function show(Role $role)
    {
        return $this->RoleRepository->show($role);
    }

    public function store(RoleRequest $request)
    {
        $parms = $request->all();
        return $this->RoleRepository->store($parms);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $parms = $request->all();
        return $this->RoleRepository->update($parms, $role);
    }

    public function destroy($id)
    {
        return $this->RoleRepository->destroy($id);
    }
}
