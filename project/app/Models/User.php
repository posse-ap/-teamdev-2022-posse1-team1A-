<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    public function haveTickets()
    {
        return $this->hasMany('App\Models\Ticket')->where('ticket_status_id', TicketStatus::getPendingId())->exists();
    }

    public function countTickets()
    {
        return $this->hasMany('App\Models\Ticket')->where('ticket_status_id', TicketStatus::getPendingId())->count();
    }

    public static function getDefaultIcon()
    {
        return 'img/user-icon.jpeg';
    }
}
