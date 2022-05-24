{{$receiver->nickname}} 様<br>
<br>
Anovey (アノベイ) をご利用いただき誠にありがとうございます。<br>
<br>
{{$partner->nickname}}様との通話日時が【予約】されました。<br>
以下をご確認の上、リンクよりチャット画面の内容をご確認ください。<br>
<br>
■通話参加者
　{{$receiver->nickname}}様<br>
　{{$partner->nickname}}様<br>
<br>
■通話日時<br>
　{{ $scheduled_date }}<br>
<br>
■Anoveyチャットページ<br>
{{route('chat.respondent_chat_list')}}
