@extends('layouts.anovey')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endpush

@section('content')
    @include('components.user-header')

    <main>
        <section class="pt-5 mb-20">
            <div class="container mx-auto px-6">
                <h1 class="text-center text-lg lg:text-4xl my-10">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-5">Thanks!</span><br>
                    ご購入ありがとうございました！
                </h1>
                <p class="font-thin text-center text-sm md:text-base mt-10 md:mt-20">
                    トップページに戻り、<br>
                    早速ご希望の会社・部署の方と<br class="sm:hidden">
                    チャットを開始しましょう。
                </p>
                <div class="my-12 md:my-20">
                    <a href={{ route('user_index') }}
                        class="block w-min whitespace-nowrap cursor-pointer mx-auto px-20 py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        トップページに戻る
                    </a>
                </div>
                <div class="bg-gray-50 rounded-md p-6 md:p-10">
                    <h2 class="notes relative pb-4 text-base md:text-lg text-center">
                        <span>相談チケット使用に関する注意事項</span>
                    </h2>
                    <ul class="font-thin list-disc px-5 mt-8 text-sm md:text-base">
                        <li>チケット消費のタイミングは日程調整の確定時です。</li>
                        <li>日程調整後、通話実施前にキャンセルとなった場合、消費されていたチケットは返却されます。</li>
                        <li>チケットの返品につきましては管理者にお問い合わせください。</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection
