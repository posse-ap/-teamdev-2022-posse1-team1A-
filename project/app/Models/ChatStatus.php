<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatStatus extends Model
{
    use HasFactory;

    public static function getIsChattingId()
    {
        return 0;
    }

    public static function getIsFinishedId()
    {
        return 1;
    }
}
