@extends('layouts.anovey')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush

@section('content')

    @include('components.user-header')

    <main>
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
                            検索結果
                        </p>
                    </div>
                </div>
                <div class="flex mt-8 space-y-3 space-y-0 flex-row">
                    <input type="text"
                        class="w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                        placeholder="企業名や部署名などのフリーワード">

                    <button
                        class="p-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-800 rounded-lg w-auto mx-4 hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                        <img src="{{ asset('img/search.svg') }}" alt="">
                    </button>
                </div>
            </div>
        </section>

        <section>
            <div class="container mx-auto px-6 md:px-20">
                <p class="font-thin mb-5">検索結果 2件</p>
                <div class="bg-gray-50 p-4 md:px-10 md:py-14 mb-5">
                    <div class="md:flex items-center md:ustify-between">
                        <div class="flex">
                            <div class="user-icon mr-5 border w-16 h-16">
                                <img src="{{ asset('img/user1.png') }}" alt="ユーザー1">
                            </div>
                            <div class="flex items-center">
                                <div>
                                    <div class="flex items-center mb-3 md:mb-5">
                                        <p class="text-base md:text-xl mr-5">たかし</p>
                                        {{-- TODO:相互評価機能実装後作成 --}}
                                        {{-- <p class="font-thin text-sm md:text-base">相談満足度：90%</p> --}}
                                    </div>
                                    <div class="md:flex mt-auto items-end">
                                        <p class="font-thin mr-5 text-sm md:text-base">〇〇会社・△△部署</p>
                                        <p class="font-thin text-sm md:text-base">勤務期間：10年</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md:ml-auto mt-5 md:mt-0">
                            <button class="block mx-auto px-4 py-2 font-xs md:font-medium text-white capitalize transition-colors duration-200 transform bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                チャットする
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 md:px-10 md:py-14 mb-5">
                    <div class="md:flex items-center md:ustify-between">
                        <div class="flex">
                            <div class="user-icon mr-5 border w-16 h-16">
                                <img src="{{ asset('img/user1.png') }}" alt="ユーザー1">
                            </div>
                            <div class="flex items-center">
                                <div>
                                    <div class="flex items-center mb-3 md:mb-5">
                                        <p class="text-base md:text-xl mr-5">たかし</p>
                                        {{-- <p class="font-thin text-sm md:text-base">相談満足度：90%</p> --}}
                                    </div>
                                    <div class="md:flex mt-auto items-end">
                                        <p class="font-thin mr-5 text-sm md:text-base">〇〇会社・△△部署</p>
                                        <p class="font-thin text-sm md:text-base">勤務期間：10年</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md:ml-auto mt-5 md:mt-0">
                            <button class="block mx-auto px-4 py-2 font-xs md:font-medium text-white capitalize transition-colors duration-200 transform bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                チャットする
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-center text-lg lg:text-4xl mb-10">
                    <span class="text-blue text-lg lg:text-2xl">Flow</span><br>
                    ご利用の流れ
                </h2>

                <div class="bg-white p-8 md:px-10 md:py-14 shadow">
                    <div class="md:flex items-center">
                        <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                            <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">01</p>
                            <p class="md:w-8/12 text-base lg:text-base">アカウント新規作成</p>
                        </div>
                        <p class="md:w-6/12 font-thin text-sm lg:text-base">
                            <a href="">新規登録画面</a>よりアカウントを作成してください。
                        </p>
                    </div>
                </div>
                <div class="triangle mx-auto my-4 md:my-8"></div>
                <div class="bg-white p-8 md:px-10 md:py-14 shadow">
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
                <div class="bg-white p-8 md:px-10 md:py-14 shadow">
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
                <div class="bg-white p-8 md:px-10 md:py-14 shadow">
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
    </main>

    @include('components.user-footer')
@endsection
