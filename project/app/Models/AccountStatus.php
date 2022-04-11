<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStatus extends Model
{
    use HasFactory;

    public static function getActiveId()
    {
        return 1;
    }

    public static function getStoppedId()
    {
        return 2;
    }

    public static function getWithdrawnId()
    {
        return 3;
    }
}
