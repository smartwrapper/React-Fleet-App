<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CurrentThemeRequest;
use App\Models\Admin\CurrentTheme;
use App\Traits\ApiResponser;

class CurrentThemeController extends Controller
{
    use ApiResponser;
    public function index()
    {
        return $this->successResponseArray(CurrentTheme::first(), 'Data Get Successfully!');
    }

    public function store(CurrentThemeRequest $request)
    {
        $parms = $request->all();
        try {
            $sql = CurrentTheme::first();
            if ($sql) {
                $sql = CurrentTheme::where('id', $sql->id)->update(['home_setting' => $parms['home_setting']]);
            } else {
                $sql = CurrentTheme::create(['home_setting' => $parms['home_setting']]);
            }
            return $this->successResponse('', 'Home page setting save successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

}
