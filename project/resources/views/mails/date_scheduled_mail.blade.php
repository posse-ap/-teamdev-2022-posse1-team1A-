{{$receiver->nickname}} 様

Anovey (アノベイ) をご利用いただき誠にありがとうございます。

{{$partner->nickname}}様との通話日時が【予約】されました。
以下をご確認の上、リンクよりチャット画面の内容をご確認ください。

■通話参加者
　{{$receiver->nickname}}様
　{{$partner->nickname}}様

■通話日時
　{{ $scheduled_date }}

■Anoveyチャットページ
{{route('chat.respondent_chat_list')}}
