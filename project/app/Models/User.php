<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'icon',
        'telephone_number',
        'company',
        'department',
        'length_of_service',
        'is_search_target',
        'account_status_id',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function havePendingTickets()
    {
        return $this->hasMany('App\Models\Ticket')->where('ticket_status_id', TicketStatus::getPendingId())->exists();
    }

    public function countTickets()
    {
        return $this->hasMany('App\Models\Ticket')->where('ticket_status_id', TicketStatus::getPendingId())->count();
    }

    public function countMatches()
    {
        return $this->hasMany('App\Models\Chat', 'respondent_user_id')->count();
    }
    
    public static function getDefaultIcon()
    {
        return 'img/user-icon.jpeg';
    }

    public function current_client_users()
    {
        return $this->hasMany(Chat::class,'respondent_user_id')->where('is_finished', ChatStatus::getIsChattingId());
    }
}
