<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// paypay関係
use PayPay\OpenPaymentAPI\Models\OrderItem;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;

use App\Models\PayPay;
use App\Models\Product;
use App\Models\Settlement;

class TicketController extends Controller
{
    public function index()
    {
        PayPay::polling();
        return view('user.ticket');
    }

    public function buy(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required',
        ]);

        $client = PayPay::client();
        $ticket_price = Product::find(Product::getTicketId())->price;

        // paypayの支払いサイトが完了したら、リダイレクトされるURL
        // ブラウザの戻るボタンで戻っても、支払いIDが決済完了になっているので３秒後にリダイレクトされ直すだけ
        $redirect_url = route('user_thanks');

        //-------------------------------------
        // 商品情報を生成する
        //-------------------------------------
        $items = (new OrderItem())
            ->setName('通話チケット')
            ->setQuantity($request->quantity)
            ->setUnitPrice(['amount' => $ticket_price, 'currency' => 'JPY']);

        //-------------------------------------
        // QRコードを生成する
        //-------------------------------------
        $payload = new CreateQrCodePayload();
        $payload->setOrderItems($items);
        $payload->setMerchantPaymentId("mpid_" . rand());    // 同じidを使いまわさないこと！
        $payload->setCodeType("ORDER_QR");
        $payload->setAmount(["amount" => $ticket_price * $request->quantity, "currency" => "JPY"]);
        $payload->setRedirectType('WEB_LINK');
        $payload->setIsAuthorization(false);
        $payload->setRedirectUrl($redirect_url);
        $payload->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $QRCodeResponse = $client->code->createQRCode($payload);
        if ($QRCodeResponse['resultInfo']['code'] !== 'SUCCESS') {
            echo ("QRコード生成エラー");
            return;
        }

        //-------------------------------------
        // 決済レコードを生成する
        //-------------------------------------
        if (Settlement::where('is_paid', false)->where('user_id', Auth::id())->exists()) {
            $settlement = Settlement::where('is_paid', false)->where('user_id', Auth::id())->first();
            $settlement->user_id = Auth::id();
            $settlement->paypay_settlement_id = $QRCodeResponse['data']['merchantPaymentId'];
            $settlement->product_id = Product::getTicketId();
            $settlement->quantity = $request->quantity;
            $settlement->amount_of_payment = $ticket_price * $request->quantity;
            $settlement->save();
        } else {
            $settlement = Settlement::firstOrNew(['paypay_settlement_id' => $QRCodeResponse['data']['merchantPaymentId']]);
            $settlement->user_id = Auth::id();
            $settlement->paypay_settlement_id = $QRCodeResponse['data']['merchantPaymentId'];
            $settlement->product_id = Product::getTicketId();
            $settlement->quantity = $request->quantity;
            $settlement->amount_of_payment = $ticket_price * $request->quantity;
            $settlement->save();
        }

        // paypayの支払いページに行く。支払いが終わったら$payload->setRedirectUrlにリダイレクトされる
        return redirect($QRCodeResponse['data']['url']);
    }

    public function thanks()
    {
        PayPay::polling();
        return view('user.thanks');
    }
}
