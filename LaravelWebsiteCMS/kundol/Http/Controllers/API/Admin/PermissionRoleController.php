<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Resources\Admin\PermissionRole as PermissionRoleResource;
use App\Models\Admin\PermissionRole;
use Auth;
use Validator;
use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

class PermissionRoleController extends Controller
{

    public function index(Request $request)
    {
        if(isset($_GET['role'])){
            $data = PermissionRoleResource::collection(PermissionRole::where('role_id',$_GET['role'])->get());
        }
        else{
            $data = PermissionRoleResource::collection(PermissionRole::all());
        }

        return response()->json(['status'=>'success', 'data' => $data], Response::HTTP_OK );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [ 
            'role_id' => 'nullable',
            'role_name' => 'required',
            'permissions' => 'required',
        ]);





        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 422);            
        }

        $role_id = "";
        if(isset($request->role_id)){
            $role_id = $request->role_id;
        }else{
            $sql = new Role ;
            $sql->name = $request->role_name;
            if($sql->save()){
                $role_id =$sql->id;
            }
           
        }


        $sql = PermissionRole::where('role_id', $request->role_id)->delete();

        for($i=0;$i < count($request->permissions);$i++){
            $permission = new PermissionRole;
            $permission->role_id = $role_id;
            $permission->permission_id = $request->permissions[$i];
            $permission->created_by = \Auth::id();
            $permission->save();
        }
        return response()->json(['status'=>'Success', 'msg' => 'Permissions are saved'], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PermissionRoleResource(PermissionRole::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
