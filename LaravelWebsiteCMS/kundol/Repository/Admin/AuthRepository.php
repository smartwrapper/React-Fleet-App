<?php

namespace App\Repository\Admin;

use App\Contract\Admin\AuthInterface;
use App\Models\User;
use App\Http\Resources\Admin\User as UserResource;
use App\Models\Admin\Permission;
use App\Models\Admin\PermissionRole;
use App\Traits\ApiResponser;
use App\Models\User as UserModel;
use Auth;

class AuthRepository implements AuthInterface
{
    use ApiResponser;
    public function store(array $parms)
    {
        $input = $parms;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        config(['auth.guards.api.provider' => 'user']);
        $token = $user->createToken('MyApp',['user'])->accessToken;
        $cookie = $this->getCookieDetails($token);
        return response()
            ->json([
                'status' => 'Success',
                'token' => $token,
                
            ], 200)
            ->cookie($cookie['name'], $cookie['value'], $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);

    }

    public function login(array $parms)
    {
        $is_active = User::select('users.*')->where('status','active')->where('email',$parms['email'])->count();
        if($is_active === 0){
                return $this->errorResponse('User access not allowed due to  inactive status.', 422);
        }
        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'user']);
            
        $admin = User::select('users.*')->with('warehouses')->find(auth()->guard('user')->user()->id);
            $success =  $admin;
            $success['token'] =  $admin->createToken('MyApp',['user'])->accessToken; 
            $cookie = $this->getCookieDetails($success['token']);
            // return $admin;
            $permission_ids = PermissionRole::where('role_id',$admin->role_id)->pluck('permission_id');
            $permissions = Permission::whereIn('id',$permission_ids)->pluck('value');
            return response()->json([
                'status' => 'Success',
                'token' => $success['token'],
                'user' => $admin,
                'user_permisions' => $permissions
            ], 200)
            ->cookie(
                $cookie['name'], 
                $cookie['value'],
                $cookie['minutes'],
                $cookie['path'], 
                $cookie['domain'], 
                $cookie['secure'],
                $cookie['httponly']
            );
        }else{ 
            return $this->errorResponse('The selected password is invalid.', 422);
        }
    }
    public function getCookieDetails($token)
    {
        return [
            'name' => '_token',
            'value' => $token,
            'minutes' => 1440,
            'path' => null,
            'domain' => null,
            // 'secure' => true, // for production
            'secure' => null, // for localhost
            'httponly' => true,
            'type' => 'user',
        ];
    }

    public function logout(array $parms)
    {
        $token = auth()->user()->token();
        $token->revoke();
        $cookie = \Cookie::forget('_token');
            return response()->json([
                'status' => 'Success',
            ])->withCookie($cookie);
        
    }

    public function show()
    {
        try {
            $user = UserModel::where('id', Auth::id())->first();
            return $this->successResponse(new UserResource($user), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $user)
    {
        try {
            $sql = $user->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new UserResource($sql), 'User Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
