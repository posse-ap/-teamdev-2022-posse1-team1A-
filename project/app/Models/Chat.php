<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory;

    public function respondent_user()
    {
        return $this->hasOne(User::class, 'id', 'respondent_user_id');
    }

    public function client_user()
    {
        return $this->hasOne(User::class, 'id', 'client_user_id');
    }

    public function last_message()
    {
        return $this->hasOne(ChatRecord::class)->latestOfMany();
    }

    public function interview_schedule()
    {
        return $this->hasOne(InterviewSchedule::class)->where('schedule_status_id', ScheduleStatus::getPendingId())->latestOfMany();
    }

    public function number_of_unread_items()
    {
        return $this->hasMany(ChatRecord::class)->where('user_id', '<>', Auth::id())->where('is_read', false)->count();
    }
}
