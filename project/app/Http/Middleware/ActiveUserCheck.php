<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountStatus;
use Illuminate\Support\Facades\Auth;

class ActiveUserCheck
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
        $user = User::find(Auth::id());
        if ($user->account_status_id === AccountStatus::getActiveId()) {
            return $next($request);
        }else{
            Auth::guard('web')->logout();
            return redirect(route('user_index'));
        }
    }
}
