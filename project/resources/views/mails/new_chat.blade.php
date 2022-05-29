{{$respondent->nickname}} 様<br>
<br>
Anovey (アノベイ) をご利用いただき誠にありがとうございます。<br>
<br>
当サービスにて、{{$respondent->nickname}} 様宛に新しい相談依頼がありました。<br>
つきましては以下を確認の上、早速相談を受けましょう！<br>
<br>
■相談依頼者<br>
{{ $client->nickname }} 様<br>
<br>
■Anoveyチャットページ<br>
{{route('chat.respondent_chat_list')}}