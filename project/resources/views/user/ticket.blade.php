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
                        <a href="{{ route('user_index') }}" class="text-gray-600 dark:text-gray-200">
                            トップ
                        </a>
                        <span class="mx-5 text-gray-500 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <p class="text-gray-600 dark:text-gray-200">
                            チケット購入
                        </p>
                    </div>
                </div>
                <h1 class="text-center text-lg lg:text-4xl mt-5 mb-10">
                    <span class="text-blue text-base lg:text-2xl inline-block md:mb-5">Ticket</span><br>
                    チケット購入
                </h1>
                <form action="" method="POST">
                    @csrf
                    <div class="md:flex mb-10 items-center justify-between">
                        <div class="bg-gray-50 rounded-md w-40 p-8 mx-auto mb-5 md:mb-0 md:mr-10">
                            <img src="{{ asset('/img/ticket1.png') }}" alt="チケット" class="w-full h-full">
                        </div>
                        <div class="w-full">
                            <div class="flex md:block items-center">
                                <h2 class="text-base md:text-lg mr-3 md:mr-0 md:mb-1">
                                    チケット
                                </h2>
                                <p class="text-gray-500 text-sm md:text-base">¥1,200（1枚あたり）</p>
                            </div>
                            <div class="w-full flex mt-5 items-center">
                                <label for="" class="inline-block whitespace-nowrap text-sm md:text-base">数量：</label>
                                <select
                                    class="inline-block w-full rounded-md bg-gray-50 py-2 pl-3 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="quantity">
                                    <option></option>
                                    {{-- チケットは1~5の範囲で選択できます --}}
                                    @for ($i = 1; $i < 6; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>

                            </div>
                        </div>
                    </div>

                    @include('components.notes')

                    <div class="mt-10">
                        <button
                            class="block mx-auto px-20 py-2 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                            購入手続きへ
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    @include('components.user-footer')
@endsection
