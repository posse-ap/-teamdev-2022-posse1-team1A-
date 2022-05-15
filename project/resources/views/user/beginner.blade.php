@extends('layouts.anovey')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beginner.css') }}">
@endpush

@section('content')
    @include('components.user-header')

    <main>
        <section class="fv bg-no-repeat overflow-hidden bg-center">
            <div class="container px-6 md:px-32 mx-auto">
                <div class="flex items-end">
                    <h1 class="text-xl font-semibold text-gray-800 lg:text-3xl">
                        Anoveyのご利用が<br>
                        <span class="block mt-3 text-2xl font-semibold text-gray-800 lg:text-5xl">初めての方へ</span>
                    </h1>
                    <div class="lg:ml-5">
                        <img src="{{ asset('/img/beginner.png') }}" alt="若葉" class="w-12 xl:w-16">
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-50 pt-5">
            <div class="container mx-auto px-6 md:px-20">
                <div>
                    <div class="flex items-center py-4 mx-auto overflow-y-auto whitespace-nowrap font-thin text-sm">
                        <a href="/" class="text-gray-600 dark:text-gray-200">
                            トップ
                        </a>
                        <span class="mx-5 text-gray-500 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <p class="text-gray-600 dark:text-gray-200">
                            初めての方へ
                        </p>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="bg-white sm:w-4/5 mx-auto p-6 md:p-12">
                        <h2 class="index pb-5 text-blue text-lg md:text-xl">目次</h2>
                        <ol class="list-decimal list-inside pt-5">
                            <li class="text-base">
                                <a href="#philosophy">”Anovey”の理念</a>
                            </li>
                            <li class="my-3 text-base">
                                <a href="#requester">依頼者の方へ</a>
                                <ol class="font-thin text-base ml-5">
                                    <li>
                                        <a href="#requesterAbout"><span class="font-bold">“Anovey”</span>とは？</a>
                                    </li>
                                    <li>
                                        <a href="#requesterFlow">ご利用の流れ<a>
                                    </li>
                                    <li>
                                        <a href="#requesterTicket">相談チケットについて<a>
                                    </li>
                                </ol>
                            </li>
                            <li class="my-3 text-base">
                                <a href="#respondent">匿名回答者の方へ</a>
                                <ol class="font-thin text-base ml-5">
                                    <li>
                                        <a href="#respondentAbout"><span class="font-bold">“Anovey”</span>とは？</a>
                                    </li>
                                    <li>
                                        <a href="#respondentFlow">匿名回答者の方のご利用の流れ<a>
                                    </li>
                                    <li>
                                        <a href="#respondentReward">報酬について<a>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden" id="philosophy">
            <div class="container mx-auto px-6">
                <h2 class="text-center text-lg lg:text-4xl mb-16">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-5">Philosophy</span><br>
                    “Anovey”の理念
                </h2>
                <div class="flex max-w-sm sm:max-w-none sm:w-3/5 md:w-4/5 mx-auto px-5 sm:px-0">
                    <div class="w-28 sm:w-30 md:w-60 lg:w-80">
                        <img src="{{ asset('/img/philosophy.png') }}" alt="“Anovey”運営責任者 遠竹悠" class="w-full">
                    </div>
                    <div class="relative">
                        <div class="philosophy-sentence text-sm md:text-lg md:text-xl lg:text-3xl">
                            <p
                                class="bg-navy text-white w-min whitespace-nowrap px-1 md:px-5 py-1 md:py-3 mr-2 sm:mr-16 lg:mr-24 xl:mr-32 shadow">
                                たった独りで転職と向き合う人が、</p>
                            <p class="bg-navy text-white w-min whitespace-nowrap ml-auto px-1 md:px-5 py-1 md:py-3 shadow">
                                いない社会に</p>
                            <p class="w-min whitespace-nowrap ml-auto text-sm md:text-lg mt-5">“Anovey”運営責任者　遠竹 悠</p>
                        </div>
                    </div>
                </div>
                <div class="note-box relative bg-gray-50 rounded-md p-6 md:p-10 my-16">
                    <h2 class="notes relative pb-4 text-base md:text-lg text-center">
                        <span>十分な情報のある、<br class="sm:hidden">自信に満ちた転職を</span>
                    </h2>
                    <p class="font-thin mt-8 text-sm md:text-base">
                        同期で初めての転職で相談者がいない、<br>
                        転職先希望の企業の知り合いがいない、<br>
                        転職先で内定をもらい1週間で決断しなければいけない...<br><br>

                        情報が足りないがゆえ転職を悩む人たちが、転職希望先企業の方と繋がれる場所があったらどうだろう？<br><br>

                        そんな思いから<span class="font-bold">“Anovey”</span>は生まれました。<br><br>

                        <span class="font-bold">“Anovey”</span>は匿名で転職者と企業を繋ぐ相談プラットフォームを提供し、<br>
                        転職を希望する人が満足し自信に満ちた転職ができるよう、応援しています。
                    </p>
                </div>
            </div>
        </section>

        <section class="overflow-hidden bg-gray-50">
            <h2 class="text-center text-navy text-xl lg:text-4xl mb-10 md:mb-16" id="requester">依頼者の方へ</h2>
            <div class="container mx-auto px-6">
                <h3 class="text-center text-lg lg:text-4xl mb-10" id="requesterAbout">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-5">About</span><br>
                    "Anovey"とは？
                </h3>
                <div class="items-center md:flex">
                    <div class="w-full md:w-1/2">
                        <div>
                            <p class="font-bold mb-5 text-base lg:text-xl text-center md:text-left">
                                企業の方と匿名で相談ができる<br>
                                転職相談プラットフォームです。
                            </p>
                            <p class="font-thin text-sm lg:text-base text-center md:text-left">
                                時間もない、相談できる人もいない・・・<br>
                                そんな悩みを抱えているあなたにぴったりな、<br>
                                匿名で転職先の人に相談できるサービスです。
                            </p>
                            <div class="mt-10">
                                <a href={{ route('user_ticket') }}
                                    class="w-10/12 sm:w-3/5 lg:w-2/5 mx-auto md:ml-0 block text-center whitespace-nowrap cursor-pointer py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                    匿名回答者を今すぐ検索
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="about-img relative flex items-center justify-center w-full mt-6 md:mt-0 md:w-1/2">
                        <img class="w-8/12 md:w-10/12 mx-auto" src="{{ asset('/img/team-meeting.png') }}"
                            alt="ミーティングをする人々">
                        <div class="ellipse hidden md:block"></div>
                    </div>
                </div>
            </div>
        </section>

        <div id="requesterFlow">
            @include('components.flow')
        </div>

        <section class="bg-gray-50">
            <div class="container mx-auto px-6">
                <h3 class="text-center text-lg lg:text-4xl mb-10" id="requesterTicket">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-3">Ticket</span><br>
                    相談チケットについて
                </h3>

                <div class="bg-white p-8 md:w-3/5 mx-auto md:px-10 md:py-12 shadow rounded-md">
                    <div class="text-center">
                        <p class="text-base lg:text-xl mb-3">ご相談1回につき</p>
                        <p class="text-blue text-2xl lg:text-4xl">1,200 円<span class="text-sm">（税込）</span></p>
                    </div>
                </div>
                <div class="md:flex lg:w-10/12 mx-auto mt-10 items-center">
                    <div class="mx-auto w-1/2 md:w-2/5 md:flex md:justify-center">
                        <img src="{{ asset('img/ticket.png') }}" alt="チケット" class="mx-auto">
                    </div>
                    <div class="mx-auto">
                        <p class="mt-10 md:mt-0 mb-10 text-sm lg:text-base text-center md:text-justify">
                            匿名回答者に相談するためには相談チケットが必要です。<br>
                            チケット1枚で1回のご相談ができます。
                        </p>
                        <div>
                            <a href={{ route('user_ticket') }}
                                class="w-full sm:w-4/5 block md:w-4/5 text-center whitespace-nowrap cursor-pointer mx-auto py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-orange rounded-md hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                チケットの購入はこちら
                            </a>
                        </div>
                    </div>
                </div>
                <h3 class="mt-16 mb-8 text-center text-base lg:text-xl">相談チケットが必要な機能</h3>
                <div class="md:flex justify-between">
                    <div class="bg-white ticket-function rounded-md">
                        <div class="bg-blue py-5 text-center rounded-t-md">
                            <p class="text-white">チャット機能</p>
                        </div>
                        <div class="px-5 py-8 font-thin text-sm lg:text-base">
                            <p>相談チケットを1枚以上購入することで、ご希望の会社・部署の方とチャットをすることができます。</p>
                        </div>
                    </div>
                    <div class="bg-white ticket-function my-10 md:my-0 rounded-md w-">
                        <div class="bg-blue py-5 text-center rounded-t-md">
                            <p class="text-white">日程登録</p>
                        </div>
                        <div class="px-5 py-8 font-thin text-sm lg:text-base">
                            <p>日程のご相談が終了し、日程を確定する段階でチケットが消費されます。</p>
                        </div>
                    </div>
                    <div class="bg-white ticket-function rounded-md">
                        <div class="bg-blue py-5 text-center rounded-t-md">
                            <p class="text-white">通話機能</p>
                        </div>
                        <div class="px-5 py-8 font-thin text-sm lg:text-base">
                            <p>日程登録が終了次第、通話機能もご利用いただけます。</p>
                        </div>
                    </div>
                </div>

                @include('components.notes-white')

                <div class="container mx-auto px-6">
                    <a href="{{ route('user_index') }}"
                        class="cta block bg-white px-5 py-2 md:w-4/12 mx-auto border-double border-4 border-black">
                        <p class="text-center text-md lg:text-lg">匿名回答者を今すぐ検索</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="overflow-hidden">
            <h2 class="text-center text-navy text-xl lg:text-4xl mb-10 md:mb-16" id="respondent">匿名回答者の方へ</h2>
            <div class="container mx-auto px-6">
                <h3 class="text-center text-lg lg:text-4xl mb-10" id="respondentAbout">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-5">About</span><br>
                    "Anovey"とは？
                </h3>
                <div class="items-center md:flex">
                    <div class="w-full md:w-1/2">
                        <div>
                            <p class="font-bold mb-5 text-base lg:text-xl text-center md:text-left">
                                匿名で転職希望者の相談に乗る、<br>
                                転職相談プラットフォームです。
                            </p>
                            <p class="font-thin text-sm lg:text-base text-center md:text-left">
                                転職希望者の悩みはなんだろうか？<br>
                                自社が転職希望者からはどう見えているのだろうか、<br>
                                転職者の相談を短時間の通話で聞くことのできるサービスです。
                            </p>
                            <div class="mt-10">
                                {{-- TODO:アカウント作成ページのリンクを貼る --}}
                                <a href=""
                                    class="w-10/12 sm:w-3/5 lg:w-2/5 mx-auto md:ml-0 block text-center whitespace-nowrap cursor-pointer py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                    アカウント作成
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="about-img relative flex items-center justify-center w-full mt-6 md:mt-0 md:w-1/2">
                        <img class="w-8/12 md:w-10/12 mx-auto" src="{{ asset('/img/team-meeting.png') }}"
                            alt="ミーティングをする人々">
                        <div class="ellipse hidden md:block"></div>
                    </div>
                </div>
            </div>
        </section>

        <div id="respondentFlow">
            @include('components.flow-respondent')
        </div>

        <section>
            <div class="container mx-auto px-6">
                <h3 class="text-center text-lg lg:text-4xl mb-10" id="respondentReward">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-3">Reward</span><br>
                    報酬について
                </h3>

                <div class="bg-gray-50 p-8 md:w-3/5 mx-auto md:px-10 md:py-12 shadow rounded-md">
                    <div class="text-center">
                        <p class="text-base lg:text-xl mb-3">ご相談1回につき</p>
                        <p class="text-blue text-2xl lg:text-4xl">1,000 円</p>
                    </div>
                </div>
                <div class="md:flex lg:w-10/12 mx-auto mt-16 items-center">
                    <div class="mx-auto w-1/2 md:w-1/3 md:flex md:justify-center">
                        <img src="{{ asset('img/reward.png') }}" alt="報酬" class="mx-auto">
                    </div>
                    <div class="mx-auto">
                        <p class="mt-10 md:mt-0 mb-10 text-sm lg:text-base text-center md:text-justify">
                            10分のご相談に乗るだけで<br>
                            1,000円の報酬を獲得できます。
                        </p>
                    </div>
                </div>

                <div class="note-box relative bg-gray-50 rounded-md pl-6 pt-6 pr-3 pb-3 md:pl-10 md:pt-10 my-16">
                    <h2 class="notes relative pb-4 text-base md:text-lg text-center">
                        <span>報酬に関する注意事項</span>
                    </h2>
                    <ul class="font-thin list-disc px-5 mt-8 text-sm md:text-base">
                        <li>お支払いは月末締め、翌月末までに支払う形となっております。</li>
                        <li>通話の実施回数をカウントするため、キャンセルとなった通話は回数に含まれません。</li>
                        <li>お支払い方法は<span class="font-bold">PayPay</span>のみとなっております。</li>
                    </ul>
                    <div class="w-28 ml-auto">
                        <img src="{{ asset('/img/paypay2.png') }}" alt="paypay" class="w-full">
                    </div>
                </div>

                <div class="container mx-auto px-6">
                    {{-- TODO:アカウント作成ページはる --}}
                    <a href="" class="cta block bg-white px-5 py-2 md:w-4/12 mx-auto border-double border-4 border-black">
                        <p class="text-center text-md lg:text-lg">アカウント作成</p>
                    </a>
                </div>
            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection
