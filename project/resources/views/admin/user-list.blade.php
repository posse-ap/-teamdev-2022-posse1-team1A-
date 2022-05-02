<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>ユーザー一覧</title>
</head>

<body class="bg-grey-100 w-full">
    <div class="flex">

        @include('components.admin-bar')

        <div class="w-full mx-5">
            <h1 class="text-5xl py-12 text-blue-800">ユーザー一覧</h1>
            <form class="space-y-3 space-y-0 py-5 flex" action="{{ route('admin_search') }}" method="POST">
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
                    <thead class="bg-lightblue-200 w-full">
                        <tr class="w-full">
                            <th class="w-1/8 px-4 py-2 text-xs">本名</th>
                            <th class="w-1/8 px-4 py-2 text-xs">登録名</th>
                            <th class="w-1/8 px-4 py-2 text-xs">会社名</th>
                            <th class="w-1/8 px-4 py-2 text-xs">部署名</th>
                            <th class="w-1/4 px-4 py-2 text-xs">メールアドレス</th>
                            <th class="w-1/8 px-4 py-2 text-xs">被通報回数</th>
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
                                <td class="border-b px-4 py-2 text-sm"></td>
                                <td class="border-b px-4 py-2 text-sm text-center"><button
                                        class="bg-red-500 px-2 py-1 rounded text-white">アカウント停止</button></td>
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
</body>

</html>
