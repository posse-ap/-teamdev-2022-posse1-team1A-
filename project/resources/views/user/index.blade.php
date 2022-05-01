@extends('layouts.anovey')
@section('meta')
    <meta name="description" content="転職者と企業を匿名で繋ぐマッチングプラットフォームです。独りで転職に悩む人に向けたこのサービスでは、内定先で働く人の生の情報を手に入れることができます。" />

    <meta property="og:title" content="Anovey 転職者と企業を匿名で繋ぐマッチングプラットフォーム" />
    <meta property="og:description"
        content="転職者と企業を匿名で繋ぐマッチングプラットフォームです。独りで転職に悩む人に向けたこのサービスでは、内定先で働く人の生の情報を手に入れることができます。" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="ja_JP" />
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endpush

@section('content')
    @include('components.user-header')

    <main>
        <section class="fv bg-no-repeat overflow-hidden" id="top">
            <div class="container px-6 mx-auto">
                <div class="items-center md:flex">
                    <div class="w-full md:w-1/2">
                        <div class="md:max-w-lg">
                            <h1 class="text-2xl lg:text-6xl font-semibold text-gray-800 lg:text-3xl">
                                転職者と企業を匿名で繋ぐ<br>
                                マッチングプラットフォーム
                            </h1>

                            <form class="flex mt-8 space-y-3 space-y-0 flex-row" action="{{ route('user_search') }}"
                                method="POST">
                                @csrf
                                <input type="text" name="keyword" value="{{ $keyword }}"
                                    class="w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                                    placeholder="企業名や部署名などのフリーワード">

                                <button type="submit"
                                    class="p-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 bg-blue-800 rounded-lg w-auto mx-4 hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                                    <img src="{{ asset('img/search.svg') }}" alt="検索">
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="flex items-center mt-16 md:mt-0 fv-img">
                        <img class="w-100" src="{{ asset('/img/FV-pc.png') }}" alt="#">
                    </div>
                </div>
            </div>
        </section>

        <div class="max-w-screen-xl mx-auto py-5">
            <h2 class="text-center my-4 text-lg lg:text-xl">Anoveyで相談できる企業</h2>
            <div class="flex items-center">
                <div class="w-1/5 mx-auto">
                    <img src="{{ asset('img/recruit-logo.jpeg') }}" alt="RECRUIT">
                </div>
                <div class="w-1/5">
                    <img src="{{ asset('img/mitsui&co.-logo.svg') }}" alt="mitsui&co."
                        class="object-contain w-8 md:w-14 mx-auto">
                </div>
                <div class="w-1/5">
                    <img src="{{ asset('img/amazon-logo.svg') }}" alt="amazon" class="object-contain w-3/5 mx-auto">
                </div>
                <div class="w-1/5">
                    <img src="{{ asset('img/google-logo.png') }}" alt="google" class="object-contain w-3/5 mx-auto">

                </div>
                <div class="w-1/5">
                    <img src="{{ asset('img/accenture-logo.png') }}" alt="accenture" class="object-contain w-3/5 mx-auto">
                </div>

            </div>
        </div>

        <section class="bg-gray-50">
            <div class="container mx-auto px-6 md:px-20">
                <h2 class="text-center text-lg lg:text-2xl">内定承諾のために、<br class="md:hidden">会社について色々知りたいけど・・・</h2>
                <div class="md:flex flex-row w-full">
                    <div class="md:w-4/12">
                        <div class="text-center mt-3">
                            <img src="{{ asset('img/worries1.png') }}" alt="思考する人" class="w-6/12 md:w-10/12 mx-auto">
                        </div>
                        <p class="text-center text-sm lg:text-lg font-thin">相談できる人がいない</p>
                    </div>
                    <div class="md:w-4/12">
                        <div class="mt-3">
                            <img src="{{ asset('img/worries2.png') }}" alt="考える人" class="w-6/12 md:w-10/12 mx-auto">
                        </div>
                        <p class="text-center text-sm lg:text-lg font-thin">企業の本当の情報が分からない</p>
                    </div>
                    <div class="md:w-4/12">
                        <div class="mt-3">
                            <img src="{{ asset('img/worries3.png') }}" alt="時計を見る人" class="w-6/12 md:w-10/12 mx-auto">
                        </div>
                        <p class="text-center text-sm lg:text-lg font-thin">時間がない</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="wide-triangle"></div>
        <div class="bg-blue py-10">
            <p class="text-white text-center text-lg lg:text-2xl">そのお悩み、Anoveyが解決します！</p>
        </div>

        <section class="overflow-hidden">
            <div class="container mx-auto px-6">
                <h2 class="text-center text-lg lg:text-4xl mb-10">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-5">About</span><br>
                    "Anovey"とは？
                </h2>
                <div class="items-center md:flex">
                    <div class="w-full md:w-1/2">
                        <div class="">
                            <div class="">
                                <p class="font-bold mb-5 text-base lg:text-xl text-center md:text-left">
                                    企業の方と匿名で相談ができる<br>
                                    転職相談プラットフォームです。
                                </p>
                                <p class="font-thin text-sm lg:text-base text-center md:text-left">
                                    時間もない、相談できる人もいない・・・<br>
                                    そんな悩みを抱えているあなたにぴったりな、<br>
                                    匿名で転職先の人に相談できるサービスです。
                                </p>
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

        <section class="bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-center text-lg lg:text-4xl mb-5">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-3">Feature</span><br>
                    サービスの特徴
                </h2>

                <div>
                    <div class="md:flex">
                        <div class="md:w-6/12">
                            <img src="{{ asset('/img/feature1.png') }}" alt="相談する人たち" class="w-10/12 mx-auto">
                        </div>
                        <div class="feature-explain-right flex items-center">
                            <div
                                class="feature-box bg-white w-10/12 ml-auto md:w-full flex items-center py-10 md:py-12 px-8 md:px-16 rounded-l-xl shadow">
                                <div>
                                    <p class="feature-lead text-navy text-3xl lg:text-4xl mb-5">
                                        01
                                    </p>
                                    <p class="text-sm font-thin lg:text-base">
                                        完全に<span class="font-bold">匿名で</span>匿名で相談をすることができます。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex md:flex-row-reverse md:my-5 lg:my-0">
                        <div class="md:w-6/12">
                            <img src="{{ asset('/img/feature2.png') }}" alt="閃いた人" class="w-10/12 mx-auto">
                        </div>
                        <div class="feature-explain-left flex items-center">
                            <div
                                class="feature-box bg-white w-10/12 mr-auto md:w-full flex items-center py-10 md:py-12 px-8 md:px-16 rounded-r-xl shadow">
                                <div class="ml-auto">
                                    <p class="feature-lead text-navy text-3xl lg:text-4xl mb-5">
                                        02
                                    </p>
                                    <p class="text-sm font-thin lg:text-base">
                                        気になる企業の部署で働いている人の<span class="font-bold">生の情報</span>を聞くことができます。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex">
                        <div class="md:w-6/12">
                            <img src="{{ asset('/img/feature3.png') }}" alt="オンライン通話をしている人" class="w-10/12 mx-auto">
                        </div>
                        <div class="feature-explain-right flex items-center">
                            <div
                                class="feature-box bg-white w-10/12 ml-auto md:w-full flex items-center py-10 md:py-12 px-8 md:px-16 rounded-l-xl shadow">
                                <div>
                                    <p class="feature-lead text-navy text-3xl lg:text-4xl mb-5">
                                        03
                                    </p>
                                    <p class="text-sm font-thin lg:text-base">
                                        気軽に<span class="font-bold">10分から</span>相談可能です。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container mx-auto px-6">
                <h2 class="text-center text-lg lg:text-4xl mb-10">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-3">Ticket</span><br>
                    相談チケットについて
                </h2>

                <div class="bg-gray-50 p-8 md:w-3/5 mx-auto md:px-10 md:py-12 shadow rounded-md">
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
                        <div class="">
                            <a href={{ route('user_ticket') }}
                                class="block md:w-4/5 text-center whitespace-nowrap cursor-pointer mx-auto py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-orange rounded-md hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                チケットの購入はこちら
                            </a>
                        </div>
                    </div>
                </div>
                <h3 class="mt-16 mb-8 text-center text-base lg:text-xl">相談チケットが必要な機能</h3>
                <div class="md:flex justify-between">
                    <div class="bg-gray-50 ticket-function rounded-md">
                        <div class="bg-blue py-5 text-center rounded-t-md">
                            <p class="text-white">チャット機能</p>
                        </div>
                        <div class="px-5 py-8 font-thin text-sm lg:text-base">
                            <p>相談チケットを1枚以上購入することで、ご希望の会社・部署の方とチャットをすることができます。</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 ticket-function my-10 md:my-0 rounded-md w-">
                        <div class="bg-blue py-5 text-center rounded-t-md">
                            <p class="text-white">日程登録</p>
                        </div>
                        <div class="px-5 py-8 font-thin text-sm lg:text-base">
                            <p>日程のご相談が終了し、日程を確定する段階でチケットが消費されます。</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 ticket-function rounded-md">
                        <div class="bg-blue py-5 text-center rounded-t-md">
                            <p class="text-white">通話機能</p>
                        </div>
                        <div class="px-5 py-8 font-thin text-sm lg:text-base">
                            <p>日程登録が終了次第、通話機能もご利用いただけます。</p>
                        </div>
                    </div>
                </div>
                <div class="note-box relative bg-gray-50 rounded-md pl-6 pt-6 pr-3 pb-3 md:pl-10 md:pt-10 mt-20 mb-10">
                    <h2 class="notes relative pb-4 text-base md:text-lg text-center">
                        <span>相談チケットに関する注意事項</span>
                    </h2>
                    <ul class="font-thin list-disc px-5 mt-8 text-sm md:text-base">
                        <li>匿名回答者に相談するためにはチケットが必要です。相談チケット1枚で1回の通話が可能です。</li>
                        <li>チケットを1枚以上所持していない場合はチャットを開始できません。チャットを開始したい方はチケットをご購入ください。</li>
                        <li>通話実施前にキャンセルとなった場合、使用したチケットは返却されます。</li>
                        <li>お支払い方法はpaypayのみとなっております。</li>
                    </ul>
                    <div class="w-28 ml-auto">
                        <img src="{{ asset('/img/paypay2.png') }}" alt="paypay" class="w-full">
                    </div>
                </div>

            </div>
        </section>

        @include('components.flow')

        <section>
            <div class="container mx-auto px-6">
                <a href="#top" class="cta block bg-white p-5 md:w-6/12 mx-auto border-double border-4 border-black">
                    <p class="text-center text-lg lg:text-2xl">回答者を今すぐ検索</p>
                </a>
            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection
