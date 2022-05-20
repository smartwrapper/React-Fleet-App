<?php

namespace App\Http\Middleware;

use App\Models\Admin\Setting;
use Closure;
use Illuminate\Http\Request;

class AuthenticateClient
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
        $headers = apache_request_headers();
        $settings = Setting::where('type', 'website_general')->pluck('value', 'key');
        $clientIdMatched = false;

        if (isset($headers['clientid']) && isset($headers['clientsecret'])) {
            if ($settings['client_id'] == $headers['clientid'] && $settings['client_secret'] == $headers['clientsecret']) {
                $clientIdMatched = true;

            }
        }

        if (isset($headers['Clientid']) && isset($headers['Clientsecret'])) {
            if ($settings['client_id'] == $headers['Clientid'] && $settings['client_secret'] == $headers['Clientsecret']) {
                $clientIdMatched = true;

            }
        }

        if (!$clientIdMatched) {
            return response()->json(['status' => 'client Credentials error', 'msg' => "invalid client id or client secret"], 200);
        }
        return $next($request);
    }
}
