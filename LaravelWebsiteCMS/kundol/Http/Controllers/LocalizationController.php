<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Models\Localization;
class LocalizationController extends Controller
{
    public function index($locale)
    {
        $isExisted = Localization::where('ip',\Request::ip())->first();
        if($isExisted){
            Localization::where('ip',\Request::ip())->update(['current_language' => $locale]);
        }else{
            $localization = new Localization;
            $localization->current_language = $locale;
            $localization->ip = \Request::ip();
            $localization->save();
        }
        App::setLocale($locale);
        return redirect()->back();
    }
}
