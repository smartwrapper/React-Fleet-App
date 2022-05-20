<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller as Controller;
use App\Http\Resources\Admin\Permission as PermissionResource;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PermissionResource::collection(Permission::all());
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
        foreach (Route::getRoutes()->getRoutes() as $key => $route) {
            $route_name = $route->getName();
            $seprate_routes = explode(".", $route_name);
            if ($seprate_routes[0] == 'admin') {
                $request['value'] = $route_name;
                $actionName = $seprate_routes[count($seprate_routes) - 1];
                if ($actionName == 'index') {
                    $actionName = 'View';
                } else if ($seprate_routes[count($seprate_routes) - 1] == 'store') {
                    $actionName = 'Save';
                } else if ($seprate_routes[count($seprate_routes) - 1] == 'destroy') {
                    $actionName = 'Delete';
                }
                $actionText = ucwords(str_replace("_", " ", $seprate_routes[count($seprate_routes) - 2]));
                $request['key'] = $actionName . ' ' . $actionText;
                $sql = Permission::where('value', $request['value'])->first();
                if (isset($sql->id)) {
                    $sql = Permission::where('value', $request['value']);
                    $sql->update($request->all());
                } else {
                    $sql = new Permission;
                    $sql->create($request->all());
                }
            }
        }
        return response()->json(['status' => 'success'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PermissionResource(Permission::find($id));
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
