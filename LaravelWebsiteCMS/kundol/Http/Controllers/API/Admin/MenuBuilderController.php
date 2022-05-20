<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\MenuBuilderRequest;
use App\Models\Admin\MenuBuilder;
use App\Traits\ApiResponser;

class MenuBuilderController extends Controller
{
    use ApiResponser;
    public function index()
    {
        return $this->successResponseArray(MenuBuilder::first(), 'Data Get Successfully!');
    }

    public function store(MenuBuilderRequest $request)
    {
        $parms = $request->all();
        try {
            $sql = MenuBuilder::first();
            if ($sql) {
                $sql = MenuBuilder::where('id', $sql->id)->update(['menu' => $parms['menu']]);
            } else {
                $sql = MenuBuilder::create(['menu' => $parms['menu']]);
            }
            return $this->successResponse('', 'Menu saved successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

}
