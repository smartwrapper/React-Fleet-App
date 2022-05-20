<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\AuthInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $AuthRepository;

    public function __construct(AuthInterface $AuthRepository)
    {
        $this->AuthRepository = $AuthRepository;
    }

    public function register(UserStoreRequest $request)
    {
        $parms = $request->all();
        return $this->AuthRepository->store($parms);
    }

    public function login(UserLoginRequest $request)
    {
        if (auth()->guard('user')->user() || $request->cookie('_token')) {
            //return response()->json(['status' => 'Warning', "message" => "Already logged in", "_token" => $request->cookie('_token')], 200);
        }

        $parms = $request->all();
        return $this->AuthRepository->login($parms);
    }

    public function logout(Request $request)
    {
        $parms = $request->all();
        return $this->AuthRepository->logout($parms);
    }

    public function show(Request $request)
    {
        $parms = $request->all();
        return $this->AuthRepository->show($parms);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $parms = $request->all();
        return $this->AuthRepository->update($parms, $user);
    }

    public function tokenValidate()
    {
        return response()->json(['status' => 'Success', "message" => "Token is valid!"], 200);
    }
}
