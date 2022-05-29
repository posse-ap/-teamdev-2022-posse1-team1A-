<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketStatus;

class TicketCheck
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
        $chatId = $request->route()->parameter('chat_id');
        $haveUsingTicket = Ticket::where('user_id', $user->id)->where('chat_id', $chatId)->where('ticket_status_id', TicketStatus::getUsingId())->exists();
        if ($user->havePendingTickets() || $haveUsingTicket) {
            $request->merge(['have_tickets' => true]);
        } else {
            $request->merge(['have_tickets' => false]);
        }

        return $next($request);
    }
}
