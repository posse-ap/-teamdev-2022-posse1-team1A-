<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class MyChatCheck
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
        $chatId = $request->route()->parameter('chat_id');
        if (Chat::find($chatId)->respondent_user_id === Auth::id() || Chat::find($chatId)->client_user_id === Auth::id()) {
            return $next($request);
        }
        return redirect(route('user_index'));
    }
}
