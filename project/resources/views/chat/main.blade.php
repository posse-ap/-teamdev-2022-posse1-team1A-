@extends('layouts.anovey')

@section('content')
    @include('components.user-header')
    <style>
        body {
            background-color: rgb(226 232 240);
        }

    </style>
    <div class="wrapper container mx-auto px-4 mb-5 pb-5 bg-white h-screen font-normal">
        <div class='flex flex-wrap'>
            <div class="w-full lg:w-1/4 border-r border-zinc-300 h-screen">
                <ul class="mt-5 pt-5">
                    <li class="mt-5 pt-5">チャット一覧に戻る ></li>
                    <li class="mt-3">トークを退出する ></li>
                    <li class="mt-3">通報 ></li>
                </ul>
            </div>
            <div class="w-full lg:w-3/4 box-content">
                <div class="p-5  bg-amber-100 text-xl flex justify-between">
                    <div class="font-bold">
                        たかし
                    </div>
                    <div class="">
                      <button class="bg-indigo-400 hover:bg-blue-700 text-white font-bold py-1 px-5 rounded ml-2">
                        <a href="" class="px-3">
                          通話
                        </a>
                      </button>
                      <button class="bg-yellow-400 hover:bg-gray-800 text-white font-bold py-1 px-4 rounded ml-2">
                        <a href="">
                          日程登録
                        </a>
                      </button>
                    </div>
                </div>
            </div>
        @endsection
