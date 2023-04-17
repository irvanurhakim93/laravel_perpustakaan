<?php

namespace App\Http\Middleware;

use App\Models\UserRoles;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $role)
    {
        $rolesFromDatabase = UserRoles::all();

        foreach ($rolesFromDatabase as $roles) {
            if ($role == $roles->nama && auth()->user()->role_id != $roles->id) {
                abort(403);
            }
        }

        return $next($request);
    }
}
