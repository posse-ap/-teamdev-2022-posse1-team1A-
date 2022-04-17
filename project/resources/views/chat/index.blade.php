@extends('layouts.anovey')

@section('content')
    <style>
        .List-Item {
            display: inline;
            font-size: 14px;
            color: #777777;
        }

        .List-Item::after {
            content: '＞';
            padding: 0 16px;
        }

        .List-Item:last-child::after {
            content: '';
        }

        .List-Item-Link {
            display: inline-block;
            text-decoration: none;
            color: inherit;
        }

    </style>
    @include('components.user-header')

    <div class="wrapper container mx-auto px-4 mb-5 pb-5">
        <div class="breadcrumb my-5">
            <ul class="List" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="List-Item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="" itemprop="item" class="List-Item-Link">
                        <span itemprop="name">トップ</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li class="List-Item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="" itemprop="item" class="List-Item-Link">
                        <span itemprop="name">検索結果</span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
                <li class="List-Item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="" itemprop="item" class="List-Item-Link">
                        <span itemprop="name">回答者チャット一覧</span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
            </ul>
        </div>
        <div class="title mb-5">
            <h1 class="mb-2 text-xl">回答者チャット一覧</h1>
            <p class="text-sm">依頼者からの相談を受けるページです。</p>
        </div>
        <div class="cards mb-5 pb-5">
            <!--User row -->
            <div
                class="user-row flex flex-col items-center justify-between cursor-pointer mb-3 p-1 duration-300 sm:flex-row sm:py-4 sm:pl-2 sm:pr-4 bg-amber-100">
                <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                    <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-5">
                        <img class="avatar w-16 h-16" src="img/men.png" />
                    </div>
                    <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                        <div class="skills flex flex-col">
                            <span class="subtitle mb-3 text-xl">たかし</span>
                            <span class="subtitle text-xs">よろしくお願いいたします！候補日についてですが......</span>
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
                        <img class="avatar w-16 h-16" src="img/woman.png" />
                    </div>
                    <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                        <div class="skills flex flex-col">
                          <span class="subtitle mb-3 text-xl">はなこ</span>
                          <span class="subtitle text-xs">よろしくお願いいたします！</span>
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
                        <img class="avatar w-16 h-16" src="img/men.png" />
                    </div>
                    <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4 pl-4">
                        <div class="skills flex flex-col">
                            <span class="subtitle mb-3 text-xl">たかし</span>
                            <span class="subtitle text-xs">よろしくお願いいたします！候補日についてですが......</span>
                        </div>
                    </div>
                </div>
                <!--Button content -->
                <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                    <span class="text-xs">相談日程  3/20 12:00~</span>
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
