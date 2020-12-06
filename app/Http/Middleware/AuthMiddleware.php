<?php

namespace App\Http\Middleware;

use App\Util\ResponseUtil;
use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {

        $user = $request->session()->get('user');
        if(!empty($user) && $user['id'] > 0){
            return $next($request);
        }

        if($request->expectsJson()){
            return ResponseUtil::responseJson(ResponseUtil::LOGIN_EXPIRE);
        }
        else{
            return redirect('/back/user/index');
        }
    }
}
