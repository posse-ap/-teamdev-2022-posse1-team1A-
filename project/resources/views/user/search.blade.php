@extends('layouts.anovey')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    @include('components.user-header')

    <main>
        <section class="bg-gray-50 pt-5">
            <div class="container mx-auto px-6">
                <div>
                    <div class="flex items-center py-4 mx-auto overflow-y-auto whitespace-nowrap font-thin text-sm">
                        <a href="{{ route('user_index') }}" class="text-gray-600">
                            トップ
                        </a>
                        <span class="mx-5 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <p class="text-gray-600">
                            検索結果
                        </p>
                    </div>
                </div>
                <form class="flex mt-8 space-y-3 space-y-0 flex-row max-w-2xl" action="{{ route('user_search') }}"
                    method="POST">
                    @csrf
                    <input type="text" name="keyword" value="{{ $keyword }}"
                        class="w-full px-4 py-2 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                        placeholder="企業名や部署名などのフリーワード">

                    <button type="submit"
                        class="p-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 bg-blue-800 rounded-lg w-auto ml-4 mr-0 hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                        <img src="{{ asset('img/search.svg') }}" alt="検索">
                    </button>
                </form>
            </div>
        </section>

        <section>
            <div class="container mx-auto px-6">
                <p class="font-thin mb-5">検索結果 {{ $users->total() }}件</p>

                @foreach ($users as $user)
                    <div class="bg-gray-50 p-4 md:px-10 md:py-14 mb-5">
                        <div class="md:flex items-center md:ustify-between">
                            <div class="flex">
                                <div class="user-icon mr-5 border w-16 h-16">
                                    <img src="{{ asset($user->icon) }}" alt="ユーザーアイコン">
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <div class="flex items-center mb-3 md:mb-5">
                                            <p class="text-base md:text-xl mr-5">{{ $user->nickname }}</p>
                                            {{-- TODO:相互評価機能実装後作成 --}}
                                            {{-- <p class="font-thin text-sm md:text-base">相談満足度：90%</p> --}}
                                        </div>
                                        <div class="md:flex mt-auto items-end">
                                            <p class="font-thin mr-5 text-sm md:text-base">
                                                {{ $user->company }}・{{ $user->department }}</p>
                                            <p class="font-thin text-sm md:text-base">勤務期間：{{ $user->length_of_service }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($can_start_chat)
                                <form action="{{ route('start_chat') }}" class="md:ml-auto mt-5 md:mt-0" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::id() }}" name="client_user_id">
                                    <input type="hidden" value="{{ $user->id }}" name="respondent_user_id">
                                    <button type="submit"
                                        class="block mx-auto px-4 py-2 font-xs text-white capitalize transition-colors duration-200 bg-blue rounded-md bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                        チャットする
                                    </button>
                                </form>
                            @else
                                <div class="md:ml-auto mt-5 md:mt-0">
                                    <button type="submit"
                                        class="block mx-auto px-4 py-2 font-xs text-white capitalize transition-colors duration-200 bg-blue rounded-md bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 modal-open"
                                        id="buy-ticket">
                                        チャットする
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{ $users->links() }}
            </div>
        </section>

        @include('components.flow')
    </main>
    <div id="modal-content" class="md:w-2/4 w-11/12 rounded-2xl">
        <button id="modal-close"
            class="ml-auto block text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <span class="sr-only">Close menu</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="modal-inner" id="buy-ticket-modal">
            @include('components.modals.buy-ticket')
        </div>
    </div>

    @include('components.user-footer')

    @push('scripts_bottom')
        <script src="{{ asset('js/modal.js') }}"></script>
        <script>
            //センタリングを実行する関数
            function centeringModalSyncer() {

                //画面(ウィンドウ)の幅、高さを取得
                var w = $(window).width();
                var h = $(window).height();

                // コンテンツ(#modal-content)の幅、高さを取得
                // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
                var cw = $("#modal-content").outerWidth();
                var ch = $("#modal-content").outerHeight();

                //センタリングを実行する
                $("#modal-content").css({
                    "left": ((w - cw) / 2) + "px",
                    "top": ((h - ch) / 2) + "px"
                });
            }
        </script>
    @endpush
@endsection
