<?php

namespace App\Http\Middleware;
use App\Models\AllowedIp;
use Closure;


class AdminRightsCheck

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('admin')->user()->login_restriction == '1') {
            
            $currentIp = get_client_ip();
            $allowedIps = AllowedIp::get()->pluck('ip')->toArray();
            if(!in_array($currentIp,$allowedIps))
            {
                abort(404);
            }
            
            
            // return response()->json('Your account is inactive');
            
        }
        
        return $next($request);
            
            

    }
}
