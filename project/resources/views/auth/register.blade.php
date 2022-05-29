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

@section('content')
    @include('components.user-header')
    <main class="container mx-auto font-normal mb-12 bg-slate-50">
        <div class="mt-16 max-w-2xl mx-auto">
            <h1 class="text-center text-2xl md:text-4xl mb-12">新規登録</h1>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="text-sm md:text-base">
                @csrf

                {{-- name --}}
                <div class="relative user-icon max-w-xs mx-auto mb-10">
                    <div class="h-40 w-40 mx-auto overflow-hidden rounded-full">
                        <img class="w-full h-full object-cover" src={{ asset('img/user-icon.jpeg') }}
                            alt="ユーザーアイコン" id="figure-image">
                    </div>
                    <div class="plus-icon absolute h-10 w-10 left-48 bg-lightblue-500 rounded-full" id="user-icon-button">
                    </div>
                    <input type="file" name="icon" class="hidden" id="user-icon-input" accept="image/*">
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
                        <input value="{{ old('name') }}"
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
                        <input value="{{ old('nickname') }}"
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
                        <input value="{{ old('telephone_number') }}"
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
                        <input value="{{ old('email') }}"
                            class="rounded-md bg-white w-full @error('email') border border-solid border-red-500 @enderror"
                            type="email" name="email" id="email">
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
                        <input value="{{ old('company') }}"
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
                        <input value="{{ old('department') }}"
                            class="rounded-md bg-white w-full @error('department') border border-solid border-red-500 @enderror"
                            type="text" name="department" id="department">
                    </div>
                    <div class="col-start-2 col-span-3">
                        @error('department')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- length_of_service --}}
                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="length_of_service" class="block h-min mb-2 md:mb-0">
                            勤続年数<span class="text-red-600">*</span>
                    </div>
                    <div class="col-span-3">
                        <select name="length_of_service"
                            class="rounded-md bg-white col-span-3 h-10 w-full px-3 @error('length_of_service') border border-solid border-red-500 @enderror">
                            <option value="1年未満">1年未満</option>
                            <option value="1年">1年</option>
                            <option value="2年">2年</option>
                            <option value="3年">3年</option>
                            <option value="4年">4年</option>
                            <option value="5年">5年</option>
                            <option value="6年">6年</option>
                            <option value="7年">7年</option>
                            <option value="8年">8年</option>
                            <option value="9年">9年</option>
                            <option value="10年以上">10年以上</option>
                        </select>
                        <div class="col-start-2 col-span-3">
                            @error('length_of_service')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="md:grid md:grid-cols-4 md:gap-x-8 md:gap-y-2 px-5 mb-9 items-center">
                    <div class="col-span-1 h-min">
                        <label for="password" class="block h-min mb-2 md:mb-0">
                            パスワード<span class="text-red-600">*</span>
                    </div>
                    </label>
                    <div class="col-span-3">
                        <input value="{{ old('password') }}"
                            class="rounded-md bg-white w-full @error('password') border border-solid border-red-500 @enderror"
                            type="password" name="password" id="password">
                    </div>
                    <div class="col-start-2 col-span-3">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-5 px-5 md:leading-loose leading-10">
                    <span class="md:inline block">匿名回答者としてのサービス利用を行いますか？<span class="text-red-600">*</span></span>
                    <label><input class="ml-4 mr-2" type="radio" name="is_search_target" value="1" checked>はい</label>
                    <label><input class="ml-4 mr-2" type="radio" name="is_search_target" value="0">いいえ</label>
                </div>

                <label class="px-5 md:leading-loose leading-10 text-left items-center my-5">
                    <input class="mr-2 border border-gray-300 bg-gray-200 checked:bg-gray-500 checked:border-gray-300"
                        type="checkbox" name="terms_of_service">
                    <span class="inline block">Anoveyの
                        <a class="text-blue underline" href="{{ route('terms_of_service') }}">
                            利用規約</a>
                        に同意する</span>
                    <div class="col-start-2 col-span-3">
                        @error('terms_of_service')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </label>

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
