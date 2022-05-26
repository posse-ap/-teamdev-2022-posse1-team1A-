@extends('layouts.anovey')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    <style>
        body {
            --tw-bg-opacity: 1;
            background-color: rgb(248 250 252 / var(--tw-bg-opacity));
        }

        .plus-icon {
            top: 7.65rem;
            left: 18.5rem;
        }

        header {
            z-index: 999;
        }

        .plus-icon {
            display: inline-block;
            position: relative;
            width: 18px;
            height: 18px;
            margin: 0 5px;
        }

        .plus-icon:before,
        .plus-icon:after {
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

        .plus-icon:before {
            width: 2px;
            height: 24px;
            top: 9px;
            left: 20px;
        }

    </style>
@endpush

@section('content')
    @include('components.user-header')
    <main class="container mx-auto font-normal mb-12 bg-slate-50">
        <div class="mt-16 max-w-xl mx-auto">
            <h1 class="text-xl text-center py-3">新規登録</h1>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- name --}}
                <div class="relative user-icon max-w-xs mx-auto">
                    <img class="h-40 w-auto mx-auto overflow-hidden rounded-full mb-11"
                        src="https://assets.codepen.io/5041378/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1600304177&width=512"
                        alt="ユーザーアイコン">
                    <button class="plus-icon absolute h-10 w-10 left-48  bg-lightblue-500 rounded-full"
                        id="user-icon-button"></button>
                    <input type="file" name="user-icon" class="hidden" id="user-icon-input">
                </div>

                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">氏名<span class="text-red-600">*</span></div>
                    <div class="col-span-4">
                        <input class="mb-2 rounded-md bg-lightgray-200 shadow-sm border-gray-300 border-gray-300 w-full"
                            type="text" name="name" id="">
                        <span>※ サービス上で公開されません。</span>
                    </div>
                </div>
                {{-- nickname --}}
                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">ニックネーム<span class="text-red-600">*</span></div>
                    <div class="col-span-4">
                        <input class="mb-2 bg-lightgray-200 rounded-md bg-lightgray-200 w-full" type="text" name="nickname"
                            id="">
                        <span>※ サービス上で公開されます。</span>
                    </div>
                </div>
                {{-- tel --}}
                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">電話番号<span class="text-red-600">*</span></div>
                    <div class="col-span-4">
                        <input class="mb-2 bg-lightgray-200 rounded-md bg-lightgray-200 w-full" type="tel" name="tel" id="">
                        <span>※ PayPayで使用している電話番号を入力してください。</span>
                    </div>
                </div>
                {{-- email --}}
                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">メールアドレス<span class="text-red-600">*</span></div>
                    <input class="rounded-md bg-lightgray-200 bg-lightgray-200 col-span-4 w-full" type="email" name="email"
                        id="">
                </div>
                {{-- company --}}
                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">会社名<span class="text-red-600">*</span></div>
                    <input name="company" class="rounded-md bg-lightgray-200 col-span-4 h-10 w-full">
                </div>
                {{-- department --}}
                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">部署名</div>
                    <input class="rounded-md bg-lightgray-200 col-span-4 w-full" type="text" name="department" id="">
                </div>
                {{-- length_of_service --}}
                <div class="md:grid md:grid-cols-4 md:gap-2 px-5 mb-9">
                    <div class="col-span-4">勤続年数</div>
                    <input class="rounded-md bg-lightgray-200 col-span-4 w-full" type="text" name="length_of_service" id="">
                </div>

                <div class="mb-9 px-5 md:leading-loose leading-10">
                    <span class="md:inline block">匿名回答者としてのサービス利用を行いますか？</span>
                    <label><input class="ml-4 mr-2" type="radio" name="use_service" value="1">はい</label>
                    <label><input class="ml-4 mr-2" type="radio" name="use_service" value="0" checked>いいえ</label>
                </div>

                <div class="px-5 md:leading-loose leading-10 text-center ml-auto mr-auto">
                    <input class="mr-2 border border-gray-300 bg-gray-200 checked:bg-gray-500 checked:border-gray-300" type="checkbox" name="terms_of_service"
                        value="0">
                    <span class="md:inline block">Anoveyの
                        <a class="text-blue underline" href="{{ route('terms_of_service') }}">
                            利用規約</a>
                        に同意する</span>
                </div>

                <button
                    class="block bg-lightblue-500 hover:bg-blue-300 text-white sm:text-base text-xs py-2 px-4 rounded mx-auto mb-5 w-60">
                    新規登録
                </button>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 px-5" href="{{ route('login') }}">
                        すでに会員の方はこちら
                    </a>
                </div>
            </form>
        </div>
    </main>
    @include('components.user-footer')
@endsection
