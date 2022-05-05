@extends('layouts.anovey')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    <main class="bg-grey-100 w-full">
        <div class="flex">
            @include('components.admin-bar')

            <div class="w-full mx-5">
                <h1 class="text-5xl py-12 text-blue-800">ユーザー一覧</h1>
                <form class="space-y-3 space-y-0 py-5 flex" action="{{ route('admin.userlist_search') }}" method="POST">
                    @csrf
                    <input type="text" name="keyword" value="{{ $keyword }}"
                        class="w-1/2 border-none px-4 py-2 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                        placeholder="フリーワード検索">

                    <button type="submit"
                        class="p-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 bg-blue-800 rounded-lg w-auto mx-4 hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                        <img src="{{ asset('img/search.svg') }}" alt="検索">
                    </button>
                </form>
                <div class="w-full">
                    <table class="table pt-5 h-5/6 w-full">
                        <thead class="bg-lightblue-200">
                            <tr>
                                <th class="w-1/8 px-4 py-2 text-xs">本名</th>
                                <th class="w-1/8 px-4 py-2 text-xs">登録名</th>
                                <th class="w-1/8 px-4 py-2 text-xs">会社名</th>
                                <th class="w-1/8 px-4 py-2 text-xs">部署名</th>
                                <th class="w-1/4 px-4 py-2 text-xs">メールアドレス</th>
                                <th class="w-2/8 px-4 py-2 text-xs">マッチ数</th>
                                <th class="w-1/8 px-4 py-2 text-xs"></th>
                            </tr>
                        </thead>
                        <tbody class="w-full">
                            @foreach ($users as $user)
                                <tr class="bg-white w-full">
                                    <td class="border-b px-4 py-2 text-sm">{{ $user->name }}</td>
                                    <td class="border-b px-4 py-2 text-sm">{{ $user->nickname }}</td>
                                    <td class="border-b px-4 py-2 text-sm">{{ $user->company }}</td>
                                    <td class="border-b px-4 py-2 text-sm">{{ $user->department }}</td>
                                    <td class="border-b px-4 py-2 text-sm">{{ $user->email }}</td>
                                    <td class="border-b px-4 py-2 text-sm"></td>
                                    <td class="border-b px-4 py-2 text-sm text-center">
                                        @if ($user->account_status_id === 1)
                                            {{-- アクティブアカウント --}}
                                            <form action="{{ route('admin.userlist_accountstop') }}" method="post"
                                                name="accountStop">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="submit" value="停止"
                                                    class="bg-red-500 w-4/5 px-2 py-1 rounded text-white btn-stop">アカウント停止</button>
                                            </form>
                                        @elseif ($user->account_status_id === 2)
                                            {{-- 停止中アカウント --}}
                                            <form action="{{ route('admin.userlist_accountactive') }}" method="post"
                                                name="accountActive">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="submit" value="停止"
                                                    class="bg-blue-900 w-4/5 px-2 py-1 rounded text-white btn-active">アカウント停止解除</button>
                                            </form>
                                        @else
                                            {{-- 退会済アカウント --}}
                                            <p>退会済</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $users->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('scripts_bottom')
        <script>
            $(function() {
                $(".btn-stop").click(function() {
                    if (confirm("本当にアカウントを停止しますか？")) {
                        //そのままsubmit（削除）
                    } else {
                        //cancel
                        return false;
                    }
                });
            });
            $(function() {
                $(".btn-active").click(function() {
                    if (confirm("本当にアカウント停止を解除しますか？")) {
                        //そのままsubmit（削除）
                    } else {
                        //cancel
                        return false;
                    }
                });
            });
        </script>
    @endpush
@endsection
