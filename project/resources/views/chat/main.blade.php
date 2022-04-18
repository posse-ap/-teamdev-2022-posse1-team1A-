@extends('layouts.anovey')

@section('content')
    @include('components.user-header')
    <style>
        body {
            background-color: rgb(226 232 240);
        }
        .cards {
          height: 57vh;
        }

    </style>
    <div class="wrapper container mx-auto pl-4 mb-0 pb-0 bg-white font-normal">
        <div class='flex flex-wrap'>
            <div class="w-full lg:w-1/4 border-r border-zinc-300">
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
                <div class="cards mx-3 overflow-scroll">
                  <div class="card m-5 p-3 bg-amber-100 w-72 rounded-md drop-shadow-md ml-auto">
                    日程が決まりましたら、<br>
                    日程登録ボタンを押してください。<br>
                    リマインドメールが送信されます。
                  </div>
                  <div class="card flex items-center h-max">
                    <div class="icon w-14 h-14">
                      <img src="{{ asset('img/menIcon.png') }}" alt="">
                    </div>
                    <div class="m-5 p-3 w-72 rounded-md border-2 rounded-full mr-1">
                      よろしくお願いいたします！
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400">13:00</span>
                    </div>
                  </div>
                  <div class="card flex items-center justify-end">
                    <div class="icon w-14 h-14">
                      {{-- <img src="{{ asset('img/menIcon.png') }}" alt=""> --}}
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400 block text-right">既読</span>
                      <span class="text-slate-400 block">13:00</span>
                    </div>
                    <div class="m-5 p-3 w-72 bg-slate-100 rounded-full">
                      よろしくお願いいたします！
                    </div>
                  </div>
                  <div class="card flex items-center">
                    <div class="icon w-14 h-14">
                      {{-- <img src="{{ asset('img/menIcon.png') }}" alt=""> --}}
                    </div>
                    <div class="m-5 p-3 w-72 rounded-md border-2 rounded-full mr-1">
                      よろしくお願いいたします！
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400">13:00</span>
                    </div>
                  </div>
                  <div class="card flex items-center">
                    <div class="icon w-14 h-14">
                      <img src="{{ asset('img/menIcon.png') }}" alt="">
                    </div>
                    <div class="m-5 p-3 w-72 rounded-md border-2 rounded-full mr-1">
                      よろしくお願いいたします！！！！
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400">13:00</span>
                    </div>
                  </div>
                  <div class="card flex items-center">
                    <div class="icon w-14 h-14">
                      {{-- <img src="{{ asset('img/menIcon.png') }}" alt=""> --}}
                    </div>
                    <div class="m-5 p-3 w-72 rounded-md border-2 rounded-full mr-1 bg-sky-100">
                      よろしくお願いいたします！！！！
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400">13:00</span>
                    </div>
                  </div>
                  <div class="card flex items-center">
                    <div class="icon w-14 h-14">
                      <img src="{{ asset('img/anovey.png') }}" alt="">
                    </div>
                    <div class="m-5 p-3 w-72 rounded-md border-2 rounded-full mr-1 bg-sky-100">
                      よろしくお願いいたします！！！！
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400">13:00</span>
                    </div>
                  </div>
                  <div class="card flex items-center justify-end">
                    <div class="icon w-14 h-14">
                      {{-- <img src="{{ asset('img/menIcon.png') }}" alt=""> --}}
                    </div>
                    <div class="time mt-auto mb-5">
                      <span class="text-slate-400 block text-right">既読</span>
                      <span class="text-slate-400 block">13:00</span>
                    </div>
                    <div class="m-5 p-3 w-72 bg-slate-100 rounded-full">
                      よろしくお願いいたします！
                    </div>
                  </div>
                </div>
                <div class="flex items-center ">
                  <div class="m-5 p-3 bg-slate-100 rounded-full w-full">
                    よろしくお願いいたします！
                  </div>
                  <div class="icon w-28">
                    <button class="bg-gray-400 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                      <a href="" class="px-3">
                        送信
                      </a>
                    </button>
                  </div>
                </div>
                {{-- <div class="cards mx-3">
                </div> --}}
                
            </div>
        @endsection
