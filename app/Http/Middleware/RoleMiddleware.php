<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $arUser = Auth::user();
        if($arUser['roles']==1){
            $ss = 'Admin';
        }elseif ($arUser['roles']==2) {
            $ss = 'Mod';
        }else{
            $ss = 'User';
        }
        //-----
        
        //----
        if(strpos($role,$ss) === false){
            return redirect()->route('admin.auth.error');
            
        }
        return $next($request);
    }
}
