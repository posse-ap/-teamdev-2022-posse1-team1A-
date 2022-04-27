@extends('layouts.anovey')

@section('content')

    @include('components.user-header')

    <div class="wrapper container mx-auto px-4 mb-5 pb-5">
        <div>
          <div class="flex items-center py-4 mx-auto overflow-y-auto whitespace-nowrap font-thin">
              <a href="{{ route('UserScreen_index') }}" class="text-gray-600">
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
              <span class="mx-5 text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                      fill="currentColor">
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
            <!--User row -->
            <div
                class="user-row flex flex-col items-center justify-between cursor-pointer mb-3 p-1 duration-300 sm:flex-row sm:py-4 sm:pl-2 sm:pr-4 bg-amber-100">
                <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                    <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-5">
                        <img class="avatar w-16 h-16" src="{{ asset('img/men.png') }}" />
                    </div>
                    <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                        <div class="skills flex flex-col">
                            <span class="subtitle mb-3 text-xl">たかし</span>
                            <span class="subtitle text-xs font-normal">よろしくお願いいたします！候補日についてですが......</span>
                        </div>
                    </div>
                </div>
                <!--Button content -->
                <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                    <span  class="text-xs">相談日程  3/20 12:00~</span>
                </div>
                <!--Close Button content -->
            </div>
            <!--User row -->
            <!--User row -->
            <div
                class="user-row flex flex-col items-center justify-between cursor-pointer mb-3 p-1 duration-300 sm:flex-row sm:py-4 sm:pl-2 sm:pr-4 bg-amber-100">
                <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                    <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-5">
                        <img class="avatar w-16 h-16" src="{{ asset('img/woman.png') }}" />
                    </div>
                    <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                        <div class="skills flex flex-col">
                          <span class="subtitle mb-3 text-xl">はなこ</span>
                          <span class="subtitle text-xs font-normal">よろしくお願いいたします！</span>
                        </div>
                    </div>
                </div>
                <!--Button content -->
                <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                    <span  class="text-xs">相談日程  3/20 12:00~</span>
                </div>
                <!--Close Button content -->
            </div>
            <!--User row -->
            <!--User row -->
            <div
                class="user-row flex flex-col items-center justify-between cursor-pointer mb-3 p-1 duration-300 sm:flex-row sm:py-4 sm:pl-2 sm:pr-4 bg-amber-100">
                <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                    <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-5">
                        <img class="avatar w-16 h-16" src="{{ asset('img/men.png') }}" />
                    </div>
                    <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                        <div class="skills flex flex-col">
                            <span class="subtitle mb-3 text-xl">たかし</span>
                            <span class="subtitle text-xs font-normal">よろしくお願いいたします！候補日についてですが......</span>
                        </div>
                    </div>
                </div>
                <!--Button content -->
                <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                    {{-- <span class="text-xs">相談日程  3/20 12:00~</span> --}}
                </div>
                <!--Close Button content -->
            </div>
            <!--User row -->
        </div>
        <!-- Using utilities: -->
        <button class="block bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded mx-auto mt-5">
          相談を受けつけない
        </button>
        {{-- <div class="mx-auto">
        </div> --}}
    </div>
    @include('components.user-footer')
@endsection
