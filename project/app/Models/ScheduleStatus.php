<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleStatus extends Model
{
    use HasFactory;

    public static function getPendingId()
    {
        return 1;
    }

    public static function getCancelId()
    {
        return 2;
    }

    public static function getFinishedId()
    {
        return 3;
    }
}
