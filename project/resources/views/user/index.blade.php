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
        <section class="fv bg-no-repeat overflow-hidden">
            <div class="container px-6 mx-auto">
                <div class="items-center md:flex">
                    <div class="w-full md:w-1/2">
                        <div class="md:max-w-lg">
                            <h1 class="text-2xl lg:text-6xl font-semibold text-gray-800 dark:text-white lg:text-3xl">
                                転職者と企業を匿名で繋ぐ<br>
                                マッチングプラットフォーム
                            </h1>

                            <form class="flex mt-8 space-y-3 space-y-0 flex-row" action="{{ route('UserScreen_search') }}"
                                method="POST">
                                @csrf
                                <input type="text" name="keyword" value="{{ $keyword }}"
                                    class="w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                                    placeholder="企業名や部署名などのフリーワード">

                                <button type="submit"
                                    class="p-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-800 rounded-lg w-auto mx-4 hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
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

                    <div class="relative flex items-center justify-center w-full mt-6 md:mt-0 md:w-1/2">
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
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-3">Flow</span><br>
                    ご利用の流れ
                </h2>

                <div class="bg-gray-50 p-8 md:px-10 md:py-12 shadow">
                    <div class="md:flex items-center">
                        <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                            <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">01</p>
                            <p class="md:w-8/12 text-base lg:text-base">アカウント新規作成</p>
                        </div>
                        <p class="md:w-6/12 font-thin text-sm lg:text-base">
                            {{-- TODO: 新規登録画面のリンクを貼る --}}
                            <a href="">新規登録画面</a>よりアカウントを作成してください。
                        </p>
                    </div>
                </div>
                <div class="triangle mx-auto my-4 md:my-8"></div>
                <div class="bg-gray-50 p-8 md:px-10 md:py-12 shadow">
                    <div class="md:flex items-center">
                        <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                            <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">02</p>
                            <p class="md:w-8/12 text-base lg:text-base">マッチング</p>
                        </div>
                        <p class="md:w-6/12 font-thin text-sm lg:text-base">
                            検索バーから依頼者様自身の希望にあった回答者を検索し、チャット形式で相談を開始します。
                        </p>
                    </div>
                </div>
                <div class="triangle mx-auto my-4 md:my-8"></div>
                <div class="bg-gray-50 p-8 md:px-10 md:py-12 shadow">
                    <div class="md:flex items-center">
                        <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                            <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">03</p>
                            <p class="md:w-8/12 text-base lg:text-base">日程調整</p>
                        </div>
                        <p class="md:w-6/12 font-thin text-sm lg:text-base">
                            相談を希望する回答者の方とチャットで日程調整をし、相談をする日時を決定します。
                        </p>
                    </div>
                </div>
                <div class="triangle mx-auto my-4 md:my-8"></div>
                <div class="bg-gray-50 p-8 md:px-10 md:py-12 shadow">
                    <div class="md:flex items-center">
                        <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                            <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">04</p>
                            <p class="md:w-8/12 text-base lg:text-base">10分間の相談</p>
                        </div>
                        <p class="md:w-6/12 font-thin text-sm lg:text-base">
                            当日になりましたら、チャット画面の通話ボタンにて相談を開始します。
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-50">
            <div class="container mx-auto px-6">
                <a class="cta block bg-white p-5 md:w-6/12 mx-auto border-double border-4 border-black">
                    <p class="text-center text-lg lg:text-2xl">依頼者を今すぐ検索</p>
                </a>
            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection
