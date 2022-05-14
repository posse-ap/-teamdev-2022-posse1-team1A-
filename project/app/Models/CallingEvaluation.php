<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallingEvaluation extends Model
{
    use HasFactory;

    public function calling()
    {
        return $this->belongsTo('App\Models\Calling');
    }
}


