<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Permiso
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $nombrePermiso string
     * @return mixed
     */
    public function handle($request, Closure $next, string $nombrePermiso){
        /** @var User $user */
        $user = $request->user();
        foreach($user->rol->permisos as $permiso){
            if($permiso->nombre == $nombrePermiso){
                return $next($request);
            }
        }
        return abort(403,'sin permiso');
    }
}
