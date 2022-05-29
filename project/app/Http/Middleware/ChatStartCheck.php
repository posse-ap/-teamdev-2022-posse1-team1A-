<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketStatus;

class ChatStartCheck
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
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->havePendingTickets()) {
                $request->merge(['can_start_chat' => true, 'ticket_counts' => $user->countTickets()]);
            } else {
                $request->merge(['can_start_chat' => false, 'ticket_counts' => 0]);
            }
        } else {
            $request->merge(['can_start_chat' => false, 'ticket_counts' => 0]);
        }
        return $next($request);
    }
}
