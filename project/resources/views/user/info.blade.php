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

    <main class="container mx-auto font-normal px-6 mb-12">
        <section class="pt-5 mb-20">
            <div>
                <div class="flex items-center py-4 mx-auto overflow-y-auto whitespace-nowrap font-thin text-sm">
                    <a href="{{ route('user_index') }}" class="text-gray-600 dark:text-gray-200">
                        トップ
                    </a>
                    <span class="mx-2 md:mx-5 text-gray-500 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <p class="text-gray-600 dark:text-gray-200">
                        アカウント情報
                    </p>
                </div>
            </div>
            <div class="pt-16">
                <h1 class="text-center text-2xl lg:text-4xl mb-12">アカウント情報</h1>
                <img class="h-40 w-auto mx-auto overflow-hidden rounded-full mb-5"
                    src="https://assets.codepen.io/5041378/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1600304177&width=512"
                    alt="ユーザーアイコン">
                <div class="grid grid-cols-2 md:gap-28 gap-8 mb-9">
                    <div class="col-span-1 text-right">氏名</div>
                    <div class="col-span-1">{{ $userInfo->name }}</div>
                </div>
                <div class="grid grid-cols-2 md:gap-28 gap-8 mb-9">
                    <div class="col-span-1 text-right">ニックネーム</div>
                    <div class="col-span-1">{{ $userInfo->nickname }}</div>
                </div>
                <div class="grid grid-cols-2 md:gap-28 gap-8 mb-9">
                    <div class="col-span-1 text-right">メールアドレス</div>
                    <div class="col-span-1">{{ $userInfo->email }}</div>
                </div>
                <div class="grid grid-cols-2 md:gap-28 gap-8 mb-9">
                    <div class="col-span-1 text-right">会社名</div>
                    <div class="col-span-1">{{ $userInfo->company }}</div>
                </div>
                <div class="grid grid-cols-2 md:gap-28 gap-8 mb-9">
                    <div class="col-span-1 text-right">部署名</div>
                    <div class="col-span-1">{{ $userInfo->department }}</div>
                </div>
                <div class="grid grid-cols-2 md:gap-28 gap-8 mb-9">
                    <div class="col-span-1 text-right">勤続年数</div>
                    <div class="col-span-1">{{ $userInfo->length_of_service }}</div>
                </div>
                <button
                    class="block bg-lightblue-500 hover:bg-blue-300 text-white sm:text-base text-xs py-1 px-4 rounded mx-auto mb-5 w-60">
                    <a href="">
                        プロフィールを編集する
                    </a>
                </button>
                <a href="{{ route('user_withdrawal') }}"
                    class="block bg-red-400 hover:bg-red-500 text-white sm:text-base text-xs py-1 px-4 rounded mx-auto w-60 text-center">
                    <p class="text-center">
                        退会する
                    </p>
                </a>

            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection