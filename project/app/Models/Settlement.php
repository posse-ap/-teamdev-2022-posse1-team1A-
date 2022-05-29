<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'paypay_settlement_id',
        'payment_details',
        'user_id',
        'product_id',
        'quantity',
        'amount_of_payment',
        'is_paid',
    ];
}
