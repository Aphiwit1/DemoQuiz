<?php

namespace App\Http\Middleware;

use Closure;
use App\Group_user;
use Auth;

class Student
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
        $username = Auth::user()->username;
        $permission = Group_user::select('groups_id')->where('username', '=', $username)->first();
        return $next($request);
        if($permission->groups_id == 'STUDENT'){
            $permission = $permission->groups_id;
            $request->merge(compact('permission'));
            return $next($request);
        }else{
            return back();
        }
    }
}
