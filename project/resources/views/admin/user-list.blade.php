<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>ユーザー一覧</title>
</head>

<body class="bg-grey-100">
    @include('components.admin-bar')

    <div class="mx-5">
        <h1 class="text-5xl py-12 ml-5 text-blue-800">ユーザー一覧</h1>
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
</body>

</html>
