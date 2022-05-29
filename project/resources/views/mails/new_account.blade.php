{{$user->name}} 様<br>
<br>
Anovey (アノベイ) にご登録いただき、誠にありがとうございます。<br>
{{$user->name}} 様のAnoveyへのご登録が完了いたしました。<br>
以下のページより早速Anoveyのご利用を開始しましょう！<br>
<br>
■ご登録内容<br>
・氏名<br>
　{{$user->name}}<br>
・ニックネーム<br>
　{{$user->nickname}}<br>
・メールアドレス<br>
　{{$user->email}}<br>
・会社名<br>
　{{$user->company}}<br>
・部署名<br>
　{{$user->department}}<br>
・勤続年数<br>
　{{$user->length_of_service}}<br>
<br>
■Anovey HP<br>
{{ route('user_index') }}<br>
<br>
<br>
このメールに心当たりがない方はお手数をおかけしますが、以下にてご連絡ください。<br>
■Anovey お問い合わせページ<br>
{{ route('contact-us') }}<br>
<br>
<br>
Anovey運営
