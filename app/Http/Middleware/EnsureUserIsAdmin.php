<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        $allowedRoles = ['admin', 'president', 'secretary', 'treasurer', 'media_manager'];
        if (!in_array($user->role, $allowedRoles)) {
            abort(403, 'Access denied. You do not have permission to access the admin portal.');
        }

        return $next($request);
    }
}
