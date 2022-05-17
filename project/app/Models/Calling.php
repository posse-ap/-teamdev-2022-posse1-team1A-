<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calling extends Model
{
    use HasFactory;

    public function chat()
    {
        return Chat::find($this->chat_id);
    }

    public function chats()
    {
        return $this->belongsTo('App\Models\Chat', 'chat_id');
    }

    public function calling_evaluations()
    {
        return $this->hasMany('App\Models\CallingEvaluation');
    }
}
