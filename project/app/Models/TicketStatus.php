<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    use HasFactory;

    public static function getPendingId()
    {
        return 1;
    }

    public static function getUsingId()
    {
        return 2;
    }

    public static function getUsedId()
    {
        return 3;
    }
}
