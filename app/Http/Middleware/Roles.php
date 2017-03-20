<?php

namespace App\Http\Middleware;

use Closure;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = $this->getRolesForRoute($request->route());

        if ($roles && !$request->user()->hasRole($roles)) {
            return response()->json(['error' => 'You don\'t have permissions to run make this request.'], 401);
        }

        return $next($request);
    }

    /**
     * Get roles required for provided route.
     *
     * @param $route
     * @return mixed
     */
    private function getRolesForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
