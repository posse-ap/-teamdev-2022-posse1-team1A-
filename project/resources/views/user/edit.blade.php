@extends('layouts.anovey')
@section('meta')
    <meta name="description" content="転職者と企業を匿名で繋ぐマッチングプラットフォームです。独りで転職に悩む人に向けたこのサービスでは、内定先で働く人の生の情報を手に入れることができます。" />

    <meta property="og:title" content="Anovey 転職者と企業を匿名で繋ぐマッチングプラットフォーム" />
    <meta property="og:description"
        content="転職者と企業を匿名で繋ぐマッチングプラットフォームです。独りで転職に悩む人に向けたこのサービスでは、内定先で働く人の生の情報を手に入れることができます。" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="ja_JP" />
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- エンターキーを無効化 --}}
    <script>
        $(function() {
            $('input').keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById("user-icon-button").addEventListener("click", () => {
                document.getElementById("user-icon-input").click()
                setTimeout(() => {
                    const figureImage = document.getElementById('figure-image')
                    figureImage.setAttribute('src', '/img/user-icon.jpeg')
                }, 500);
            });
        });
    </script>
@endpush

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

@section('content')
    @include('components.user-header')

    <main class="container mx-auto font-normal mb-12 bg-slate-50">
        <div class="mt-16 max-w-2xl mx-auto">
            <form action="" method="post" enctype="multipart/form-data" class="text-sm md:text-base">
                @csrf
                <input type="hidden" name="id" value="{{ $userInfo->id }}">
                <h1 class="text-center text-4xl mb-12">アカウント編集</h1>
                <div class="relative user-icon max-w-xs mx-auto mb-10">
                    <img class="h-40 w-auto mx-auto overflow-hidden rounded-full" src={{ asset($userInfo->icon) }}
                        alt="ユーザーアイコン" id="figure-image">
                    <div class="pulus-icon absolute h-10 w-10 left-48 bg-lightblue-500 rounded-full" id="user-icon-button">
                    </div>
                    <input value="{{ $userInfo->icon }}" type="file" name="icon" class="hidden"
                        id="user-icon-input" accept="image/*">
                    @error('icon')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="name" class="block h-min mb-2 md:mb-0">
                            氏名<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ $userInfo->name }}"
                            class="rounded-md bg-white w-full @error('name') border border-solid border-red-500 @enderror"
                            type="text" name="name" id="name">
                    </div>
                    <div class="col-start-2 col-span-3">
                        <p class="text-xs mt-2 md:mt-0">※ サービス上で公開されません。</p>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="nickname" class="block h-min mb-2 md:mb-0">
                            ニックネーム<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ $userInfo->nickname }}"
                            class="rounded-md bg-white w-full @error('nickname') border border-solid border-red-500 @enderror"
                            type="text" name="nickname" id="nickname">
                    </div>
                    <div class="col-start-2 col-span-3">
                        <p class="text-xs mt-2 md:mt-0">※ サービス上で公開されます。</p>
                        @error('nickname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="telephone_number" class="block h-min mb-2 md:mb-0">
                            電話番号<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ $userInfo->telephone_number }}"
                            class="rounded-md bg-white w-full @error('telephone_number') border border-solid border-red-500 @enderror"
                            type="text" name="telephone_number" id="telephone_number">
                    </div>
                    <div class="col-start-2 col-span-3">
                        <p class="text-xs mb-1 mt-2 md:mt-0">※ PayPayで使用している電話番号を入力してください。</p>
                        <p class="text-xs">※ ハイフンなしで入力してください。（例）08012345678</p>
                        @error('telephone_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="email" class="block h-min mb-2 md:mb-0">
                            メールアドレス<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ $userInfo->email }}"
                            class="rounded-md bg-white w-full @error('email') border border-solid border-red-500 @enderror"
                            type="text" name="email" id="email">
                    </div>
                    <div class="col-start-2 col-span-3">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="company" class="block h-min mb-2 md:mb-0">
                            会社名<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ $userInfo->company }}"
                            class="rounded-md bg-white w-full @error('company') border border-solid border-red-500 @enderror"
                            type="text" name="company" id="company">
                    </div>
                    <div class="col-start-2 col-span-3">
                        @error('company')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="department" class="block h-min mb-2 md:mb-0">
                            部署名<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ $userInfo->department }}"
                            class="rounded-md bg-white w-full @error('department') border border-solid border-red-500 @enderror"
                            type="text" name="department" id="department">
                    </div>
                    <div class="col-start-2 col-span-3">
                        @error('department')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="length_of_service" class="block h-min mb-2 md:mb-0">
                            勤続年数<span class="text-red-600">*</span>
                    </div>
                    <div class="col-span-3">
                        <select name="length_of_service"
                            class="rounded-md bg-white col-span-3 h-10 w-full px-3 @error('length_of_service') border border-solid border-red-500 @enderror">
                            <option value="1年未満" @selected($userInfo->length_of_service === '1年未満')>1年未満</option>
                            <option value="1年" @selected($userInfo->length_of_service === '1年')>1年</option>
                            <option value="2年" @selected($userInfo->length_of_service === '2年')>2年</option>
                            <option value="3年" @selected($userInfo->length_of_service === '3年')>3年</option>
                            <option value="4年" @selected($userInfo->length_of_service === '4年')>4年</option>
                            <option value="5年" @selected($userInfo->length_of_service === '5年')>5年</option>
                            <option value="6年" @selected($userInfo->length_of_service === '6年')>6年</option>
                            <option value="7年" @selected($userInfo->length_of_service === '7年')>7年</option>
                            <option value="8年" @selected($userInfo->length_of_service === '8年')>8年</option>
                            <option value="9年" @selected($userInfo->length_of_service === '9年')>9年</option>
                            <option value="10年以上" @selected($userInfo->length_of_service === '10年以上')>10年以上</option>
                        </select>
                        <div class="col-start-2 col-span-3">
                            @error('length_of_service')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-9 px-5 md:leading-loose leading-10">
                    <div class="md:flex md:items-center">
                        <p class="mb-1 md:mb-0">匿名回答者としてのサービス利用を行いますか？</p>
                        <div class="flex">
                            <label class="flex items-center"><input class="md:ml-4 mr-1" type="radio" name="is_search_target" value="1"
                                    @checked($userInfo->is_search_target == 1)>はい</label>
                            <label class="flex items-center"><input class="ml-4 mr-1" type="radio" name="is_search_target" value="0"
                                    @checked($userInfo->is_search_target == 0)>いいえ</label>
                        </div>
                    </div>
                    @error('is_search_target')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
    @push('scripts_bottom')
        <script>
            function file_preview() {
                const input = document.getElementById('user-icon-input')
                const figureImage = document.getElementById('figure-image')

                input.addEventListener('input', (event) => {
                    if (event.target.files.length === 0) {
                        figureImage.setAttribute('src', '/img/user-icon.jpeg')
                    } else {
                        let [file] = event.target.files

                        if (file) {
                            figureImage.setAttribute('src', URL.createObjectURL(file))
                        }
                    }
                })
            }

            file_preview()
        </script>
    @endpush
@endsection
