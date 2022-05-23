<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- name --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">氏名<span class="text-red-600">*</span></div>
                <div class="col-span-3">
                    <input class="mb-2 rounded-md bg-white w-full" type="text" name="name" id="">
                    <span>※ サービス上で公開されません。</span>
                </div>
            </div>
            {{-- nickname --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">ニックネーム<span class="text-red-600">*</span></div>
                <div class="col-span-3">
                    <input class="mb-2 rounded-md bg-white w-full" type="text" name="nickname" id="">
                    <span>※ サービス上で公開されます。</span>
                </div>
            </div>
            {{-- tel --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">電話番号<span class="text-red-600">*</span></div>
                <div class="col-span-3">
                    <input class="mb-2 rounded-md bg-white w-full" type="tel" name="tel" id="">
                    <span>※ PayPayで使用している電話番号を入力してください。</span>
                </div>
            </div>
            {{-- email --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">メールアドレス<span class="text-red-600">*</span></div>
                <input class="rounded-md bg-white col-span-3 w-full" type="email" name="email" id="">
            </div>
            {{-- company --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">会社名<span class="text-red-600">*</span></div>
                <select name="company" class="rounded-md bg-white col-span-3 h-10 w-full">
                    <option value=""></option>
                    <option value="1">11111</option>
                    <option value="2">22222</option>
                </select>
            </div>
            {{-- department --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">部署名</div>
                <input class="rounded-md bg-white col-span-3 w-full" type="text" name="department" id="">
            </div>
            {{-- length_of_service --}}
            <div class="md:grid md:grid-cols-4 md:gap-8 px-5 mb-9">
                <div class="col-span-1">勤続年数</div>
                <input class="rounded-md bg-white col-span-3 w-full" type="text" name="length_of_service" id="">
            </div>

            <div class="mb-9 px-5 md:leading-loose leading-10">
                <span class="md:inline block">匿名回答者としてのサービス利用を行いますか？</span>
                <label><input class="md:ml-4" type="radio" name="use_service" value="1">はい</label>
                <label><input class="ml-4" type="radio" name="use_service" value="0" checked>いいえ</label>
            </div>
            <button
                class="block bg-lightblue-500 hover:bg-blue-300 text-white sm:text-base text-xs py-2 px-4 rounded mx-auto mb-5 w-60">
                {{ __('Register') }}
            </button>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
