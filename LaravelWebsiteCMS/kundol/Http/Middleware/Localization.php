<?php

namespace App\Http\Middleware;

use App;
use App\Models\Localization as LocaleModal;
use Closure;
use DB;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(file_exists(storage_path('installed'))){
            $sql = DB::Select(DB::raw('SHOW TABLES LIKE "localizations"'));
            if ($sql) {
                $isExisted = LocaleModal::where('ip', \Request::ip())->first();
                if ($isExisted) {
                    App::setLocale($isExisted->current_language);
                }
            }
        
        } 
            
        return $next($request);
        
    }
}
