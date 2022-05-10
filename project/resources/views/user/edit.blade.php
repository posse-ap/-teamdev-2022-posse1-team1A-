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
    <style>
        body {
            --tw-bg-opacity: 1;
            background-color: rgb(248 250 252 / var(--tw-bg-opacity));
        }

        .pulus-icon {
            top: 7.65rem;
            left: 18.5rem;
        }

        header {
            z-index: 999;
        }

        .pulus-icon {
            display: inline-block;
            position: relative;
            width: 18px;
            height: 18px;
            margin: 0 5px;
        }

        .pulus-icon:before,
        .pulus-icon:after {
            display: block;
            content: '';
            background-color: #fff;
            border-radius: 10px;
            position: absolute;
            width: 24px;
            height: 2px;
            top: 20px;
            left: 9px;
        }

        .pulus-icon:before {
            width: 2px;
            height: 24px;
            top: 9px;
            left: 20px;
        }

    </style>
@endpush

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', function(){
            document.getElementById("user-icon-button").addEventListener("click", () => {
                document.getElementById("user-icon-input").click();
            });
		});
    </script>
@endpush

@section('content')
    @include('components.user-header')

    <main class="container mx-auto font-normal mb-12 bg-slate-50">
        <div class="mt-16 max-w-lg mx-auto">
            <h1 class="text-center text-4xl mb-12">アカウント編集</h1>
            <div class="relative user-icon max-w-xs mx-auto">
                <img class="h-40 w-auto mx-auto overflow-hidden rounded-full mb-11"
                    src="https://assets.codepen.io/5041378/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1600304177&width=512"
                    alt="ユーザーアイコン">
                <button class="pulus-icon absolute h-10 w-10 left-48 bg-lightblue-500 rounded-full" id="user-icon-button"></button>
                <input type="file" name="user-icon" class="hidden" id="user-icon-input">
            </div>
            <form action="" method="post">
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">氏名<span class="text-red-600">*</span></div>
                    <div class="col-span-3">
                        <input class="mb-2 rounded-md bg-white w-full" type="text" name="name" id="">
                        <span>※ サービス上で公開されません。</span>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">ニックネーム<span class="text-red-600">*</span></div>
                    <div class="col-span-3">
                        <input class="mb-2 rounded-md bg-white w-full" type="text" name="nickname" id="">
                        <span>※ サービス上で公開されます。</span>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">電話番号<span class="text-red-600">*</span></div>
                    <div class="col-span-3">
                        <input class="mb-2 rounded-md bg-white w-full" type="text" name="email" id="">
                        <span>※ PayPayで使用している電話番号を入力してください。</span>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">メールアドレス<span class="text-red-600">*</span></div>
                    <input class="rounded-md bg-white col-span-3 w-full" type="text" name="email" id="">
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">会社名<span class="text-red-600">*</span></div>
                    <select  name="company" class="rounded-md bg-white col-span-3 h-10 w-full">
                        <option value=""></option>
                        <option value="1">11111</option>
                        <option value="2">22222</option>
                    </select>
                    {{-- <input class="rounded-md bg-white col-span-3" type="text" name="company" id=""> --}}
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">部署名</div>
                    <input class="rounded-md bg-white col-span-3 w-full" type="text" name="department" id="">
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                    <div class="col-span-1">勤続年数</div>
                    <input class="rounded-md bg-white col-span-3 w-full" type="text" name="length_of_service" id="">
                </div>
                <div class="mb-9 px-5">
                    <span class="md:inline block">匿名回答者としてのサービス利用を行いますか？</span>
                    <input class="ml-4" type="radio" name="use_service" value="1">はい
                    <input class="ml-4" type="radio" name="use_service" value="0" checked>いいえ
                </div>
                <a href="{{ route('user_edit') }}">
                    <button
                        class="block bg-lightblue-500 hover:bg-blue-300 text-white sm:text-base text-xs py-2 px-4 rounded mx-auto mb-5 w-60">
                        決定
                    </button>
                </a>
            </form>
        </div>
    </main>

    @include('components.user-footer')
@endsection
