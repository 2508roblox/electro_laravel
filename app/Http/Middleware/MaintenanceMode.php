<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    // Kiểm tra nếu trang web đang ở chế độ bảo trì và không phải là trang admin
    if (config('app.maintenance_mode') && strpos($request->url(), '/admin/dashboard') && strpos($request->url(), '/auth/register') && strpos($request->url(), '/auth/login') === false) {
        return response(view('maintenance'));
    }

    return $next($request);
}

}
