@extends('layouts.anovey')
<div class="md:fixed table top-0 text-center bg-gray-700 h-screen w-screen wrapper px-4 pb-5">

  <div class="md:block table-cell">
    <div class="flex bg-white text-center md:w-80 w-52 md:h-80 h-52 ml-auto mr-auto overflow-hidden rounded-full my-12">
        <img src="../../img/men.png" alt="" class="ml-auto mr-auto text-center">
    </div>
    <div class="text-center text-white text-6xl mb-5">{{ $partner_name }}</div>
    <p class="text-white text-4xl text-center">10:00</p>
    {{-- TODO:9分過ぎたら文字赤色にする --}}

    <button class="mt-10 md:mt-5 w-28 h-28 bg-white rounded-full cursor-pointer">
        <a href="{{ route('chat.index', ['chat_id' => $chat_id]) }}">
            <img src="../../img/end-call.png" alt="end-call-button">
        </a>
        {{-- TODO:このボタンが押されたとき、チャット画面に戻る&通話アンケート表示したい
        現状：チャット画面に戻るだけ --}}
    </button>
    {{-- TODO: 10分経ったら「10分経ちました」モーダル表示(id="ten-minute-announce")--}}
  </div>
  </div>


<script src="{{ asset('../../js/modal.js') }}"></script>
