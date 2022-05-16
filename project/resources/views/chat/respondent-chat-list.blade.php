@extends('layouts.anovey')

@section('content')
    @include('components.user-header')

    <div class="wrapper container mx-auto px-4 mb-5 pb-5 min-h-screen">
        <div>
            <div class="flex items-center py-4 mx-auto overflow-y-auto whitespace-nowrap font-thin">
                <a href="{{ route('user_index') }}" class="text-gray-600">
                    トップ
                </a>
                <span class="mx-5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <p class="text-gray-600">
                    検索結果
                </p>
                <span class="mx-5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <p class="text-gray-600">
                    回答者チャット一覧
                </p>
            </div>
        </div>
        <div class="title mb-5  font-normal">
            <h1 class="mb-2 text-xl">回答者チャット一覧</h1>
            <p class="text-sm">依頼者からの相談を受けるページです。</p>
        </div>
        <div class="cards mb-5 pb-5">
            @foreach ($respondent_chats as $respondent_chat)
                <a class="user-row flex flex-col items-center justify-between cursor-pointer mb-3 p-1 duration-300 sm:flex-row sm:py-4 sm:pl-2 sm:pr-4 @if ($user->is_search_target == true) bg-amber-100 @else bg-gray-50 text-gray-400 pointer-events-none @endif"
                    href="{{ route('chat.index', ['chat_id' => $respondent_chat->id]) }}">
                    <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                        <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-5">
                            @if ($user->is_search_target == true)
                                <img class="avatar w-16 h-16" src="{{ asset($respondent_chat->client_user->icon) }}" />
                            @else
                                <img class="avatar w-16 h-16 opacity-50"
                                    src="{{ asset($respondent_chat->client_user->icon) }}" />
                            @endif
                        </div>
                        <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                            <div class="skills flex flex-col">
                                <span class="subtitle mb-3 text-xl">{{ $respondent_chat->client_user->nickname }}</span>
                                <span
                                    class="subtitle text-xs font-normal">{{ $respondent_chat->last_message->comment }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                        <span class="text-xs">相談日程
                            {{ $respondent_chat->interview_schedule ? "#{$respondent_chat->interview_schedule->schedule}~" : '' }}</span>
                        <span class="text-xs">未読件数 {{ $respondent_chat->number_of_unread_items() }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="fixed bottom-0 md:bottom-10 w-full">
        @if ($user->is_search_target)
            <form action="{{ route('chat.reception_stop') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full md:w-min block bg-slate-500 hover:bg-slate-600 text-white whitespace-nowrap font-bold py-4 md:py-2 px-28 rounded mx-auto">
                    相談を受けつけない
                </button>
            </form>
        @else
            <p class="text-blue-400 text-center mb-1">＼現在、相談受付停止中です／</p>
            <form action="{{ route('chat.reception_start') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full md:w-min block bg-slate-500 hover:bg-slate-600 text-white whitespace-nowrap font-bold py-4 md:py-2 px-28 md:rounded mx-auto">
                    相談を受けつける
                </button>
            </form>
        @endif
    </div>
@endsection