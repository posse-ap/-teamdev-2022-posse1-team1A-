@extends('layouts.anovey')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    <main class="bg-grey-100">
        @include('components.admin-bar')

        <div class="mx-5">
            <h1 class="text-5xl py-12 ml-5 text-blue-900">ユーザー一覧</h1>
            <div class=" ml-5 block relative space-y-3 space-y-0 py-5 flex">
                <input type="text"
                    class="w-6/12 pl-10 pr-4 text-gray-700 bg-white rounded-md focus:border-grey-200 dark:focus:border-grey-200 focus:outline-none focus:ring focus:ring-opacity-40"
                    placeholder="Search for names">
                <span class="absolute align-center py-2 px-2"><img height="25" width="25"
                        src="{{ asset('img/search-white.png') }}" alt="検索"></span>
            </div>
            <div class="ml-5">
                <table class="table pt-5 h-5/6">
                    <thead class="bg-lightblue-200">
                        <tr>
                            <th class="w-1/8 px-4 py-2 text-xs">登録名</th>
                            <th class="w-1/8 px-4 py-2 text-xs">会社名</th>
                            <th class="w-1/4 px-4 py-2 text-xs">メールアドレス</th>
                            <th class="w-1/8 px-4 py-2 text-xs">被通報回数</th>
                            <th class="w-2/8 px-4 py-2 text-xs">マッチ数</th>
                            <th class="w-1/8 px-4 py-2 text-xs"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white">
                                <td class="border-b px-4 py-2 text-sm">{{ $user->name }}</td>
                                <td class="border-b px-4 py-2 text-sm">{{ $user->company }}</td>
                                <td class="border-b px-4 py-2 text-sm">{{ $user->email }}</td>
                                <td class="border-b px-4 py-2 text-sm"></td>
                                <td class="border-b px-4 py-2 text-sm"></td>
                                <td class="border-b px-4 py-2 text-sm text-center">
                                    @if ($user->account_status_id === 1)
                                        <form action="{{ route('admin_accountstop') }}" method="post" name="accountStop">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" value="停止"
                                                class="bg-red-500 w-full px-2 py-1 rounded text-white btn-stop" id="btnStop"
                                                name="btnStop">アカウント停止</button>
                                        </form>
                                    @elseif ($user->account_status_id === 2)
                                        <form action="{{ route('admin_accountactive') }}" method="post"
                                            name="accountActive">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" value="停止"
                                                class="bg-blue-900 w-full px-2 py-1 rounded text-white btn-active"
                                                id="btnActive" name="btnActive">アカウント停止解除</button>
                                        </form>
                                    @else
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

