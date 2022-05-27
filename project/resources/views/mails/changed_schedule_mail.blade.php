{{$receiver->nickname}} 様<br>
<br>
Anovey (アノベイ) をご利用いただき誠にありがとうございます。<br>
<br>
{{$partner->nickname}}様との通話日時が【変更】されました。<br>
以下をご確認の上、リンクよりチャット画面の内容をご確認ください。<br>
<br>
■通話参加者<br>
　{{$receiver->nickname}}様<br>
　{{$partner->nickname}}様<br>
<br>
■通話日時<br>
変更後：{{ $scheduled_date }}<br>
<br>
■Anoveyチャットページ<br>
{{route('chat.respondent_chat_list')}}<br>