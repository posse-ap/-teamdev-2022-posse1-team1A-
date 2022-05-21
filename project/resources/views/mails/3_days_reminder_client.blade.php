{{$client_user->nickname}} 様<br>
<br>
Anovey (アノベイ) をご利用いただき誠にありがとうございます。<br>
<br>
{{$respondent_user->nickname}} 様との通話日時の【3日前】となりました。<br>
以下をご確認の上、当日チャット画面より通話にご参加ください。<br>
<br>
■通話参加者<br>
{{$client_user->nickname}}様<br>
{{$respondent_user->nickname}} 様<br>
<br>
■通話予定日時<br>
{{ $interview_date }}<br>
<br>
■Anoveyチャットページ<br>
{{route('chat.client_chat_list')}}