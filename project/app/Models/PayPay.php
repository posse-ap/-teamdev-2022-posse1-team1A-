<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use PayPay\OpenPaymentAPI\Client;

class PayPay extends Model
{
    use HasFactory;

    public static function client()
    {
        $client = new Client([
            'API_KEY' => env('PAYPAY_API_KEY'),
            'API_SECRET' => env('PAYPAY_API_SECRET'),
            'MERCHANT_ID' => env('PAYPAY_MERCHANT_ID')
        ], false);

        return $client;
    }

    public static function polling()
    {
        $client = PayPay::client();

        if (Settlement::where('user_id', Auth::id())->where('is_paid', false)->exists()) {
            $settlement = Settlement::where('user_id', Auth::id())->where('is_paid', false)->first();
            $merchantPaymentId = $settlement->paypay_settlement_id;
            $QRCodeDetails = $client->payment->getPaymentDetails($merchantPaymentId);
            if ($QRCodeDetails['resultInfo']['code'] !== 'SUCCESS') {
                echo ("決済情報取得エラー");
                return;
            }
            if($QRCodeDetails['data']['status'] == 'COMPLETED') {
                $settlement->is_paid = true;
                $settlement->save();
            }
        }
        return;
    }
}
