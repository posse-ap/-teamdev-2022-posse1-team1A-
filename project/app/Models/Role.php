<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static function getUserId()
    {
        return 1;
    }

    public static function getAdminId()
    {
        return 2;
    }

    public static function getBotId()
    {
        return 3;
    }
}
