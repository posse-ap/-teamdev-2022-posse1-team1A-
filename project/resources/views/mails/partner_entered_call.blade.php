{{$receiver->nickname}} 様<br>
<br>
Anovey (アノベイ) をご利用いただき誠にありがとうございます。<br>
<br>
{{$caller->nickname}} 様が通話に参加されました。<br>
以下のチャット画面リンクより通話にご参加ください。<br>
<br>
■Anoveyチャットページ<br>
　{{ route('chat.index', ['chat_id' => $chat_id]) }}
