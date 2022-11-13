<?php

namespace App\Http\Middleware;

use App\Models\api\v1\user;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!empty($request->input('apikey'))) {

            $api_key_find = user::where('api_key', $request->input('apikey'))
                ->first();

            if($api_key_find) {

                return $next($request);

            }else {

                return response('Unauthorized.', 401);

            }

        }else {
            return response('Unauthorized.', 401);
        }
    }
}
