@extends('layouts.anovey')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/ticket.css') }}">
@endpush

@section('content')
    @include('components.user-header')

    <main>
        <section class="pt-5 mb-20">
            <div class="container mx-auto px-6">
                <div>
                    <div class="flex items-center py-4 mx-auto overflow-y-auto whitespace-nowrap font-thin text-sm">
                        <a href="{{ route('user_index') }}" class="text-gray-600">
                            トップ
                        </a>
                        <span class="mx-2 md:mx-5 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <a href="{{ route('user_page') }}" class="text-gray-600">
                            アカウント情報
                        </a>
                        <span class="mx-2 md:mx-5 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <p class="text-gray-600">
                            退会フォーム
                        </p>
                    </div>
                </div>

                <div class="pt-16">
                    <h1 class="text-center text-2xl lg:text-4xl mb-12">退会フォーム</h1>
                    <form action="{{ route('user_withdrawal_post') }}" method="POST" class="mt-28 w-full md:w-4/5 mx-auto">
                        @csrf
                        <div class="md:flex items-center justify-between">
                            <label for="reason" class="block mb-5 md:mb-0">退会理由</label>
                            <textarea name="reason" id="reason" class="bg-gray-50 w-full md:w-4/5 h-40"></textarea>
                        </div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="mt-24">
                            <button
                                type="submit"
                                value="退会"
                                class="block mx-auto px-20 py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-red-400 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                退会する
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection
