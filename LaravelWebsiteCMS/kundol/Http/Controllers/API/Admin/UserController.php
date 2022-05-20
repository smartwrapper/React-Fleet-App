<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\UserInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repository\Admin\UserRepository;

class UserController extends Controller
{
    private $UserRepository;

    public function __construct(UserInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function index()
    {
        return $this->UserRepository->all();
    }

    public function show(User $user)
    {
        return $this->UserRepository->show($user);
    }

    public function store(UserStoreRequest $request)
    {
        $parms = $request->all();
        return $this->UserRepository->store($parms);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $parms = $request->all();
        return $this->UserRepository->update($parms, $user);
    }

    public function destroy($id)
    {
        return $this->UserRepository->destroy($id);
    }

}
