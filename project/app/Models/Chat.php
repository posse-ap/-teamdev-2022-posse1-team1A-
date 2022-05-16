<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function respondent_user()
    {
        return $this->belongsTo('App\Models\User', 'respondent_user_id');
    }

    public function client_user()
    {
        return $this->belongsTo('App\Models\User', 'client_user_id');
    }
}
