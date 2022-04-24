<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>ユーザー一覧</title>
</head>

<body>
    <div class="flex h-screen">
        <div class="w-1/5 bg-blue-800">

            <ul class="flex-grow">
                <div class="w-10 h-10 mt-3 flex ml-5 mr-auto">
                    <img src="{{ asset('img/logo-white.png') }}" alt="logo-black.png">
                    <p class="flex ml-0 text-sm text-white items-center"><b>Anovey<b></p>
                </div>
                <li class="mx-5 border-b"><a class="block py-5 pl-2 rounded text-white" href="#">管理者ページ</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">各種指標</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">ユーザー一覧</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">お問合せ内容</a></li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">通報一覧</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">通話評価</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">トーク評価</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">退会理由一覧</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">管理者ユーザー追加</a>
                </li>
                <li><a class="block ml-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                        href="#">利用規約・各種フォーム設定</a>
                </li>
            </ul>
        </div>
        <div class="mx-5 w-full">
          <h1 class="text-xl py-10">ユーザー一覧</h1>
            <div class="block mt-8 space-y-3 space-y-0 py-5 flex">
                <input type="text"
                    class="w-1/6 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                    placeholder="Search for names">

                <button
                    class="p-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-800 rounded-lg w-auto mx-4 hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                    <img src="{{ asset('img/search.svg') }}" alt="検索">
                </button>
            </div>
            <table class="table-fixed justify-center pt-5 justify-center">
              <thead class="bg-lightblue-200">
                <tr>
                  <th class="w-1/6 px-4 py-2 text-xs">登録名</th>
                  <th class="w-1/6 px-4 py-2 text-xs">会社名</th>
                  <th class="w-1/6 px-4 py-2 text-xs">メールアドレス</th>
                  <th class="w-1/6 px-4 py-2 text-xs">被通報回数</th>
                  <th class="w-1/6 px-4 py-2 text-xs">マッチ数</th>
                  <th class="w-1/6 px-4 py-2 text-xs"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user) 
                {{-- 何も出力されない --}}
                <tr>
                  <td class="border-b px-4 py-2 text-sm">{{ $user->name }}</td>
                  <td class="border-b px-4 py-2 text-sm">{{ $user->company }}</td>
                  <td class="border-b px-4 py-2 text-sm">{{ $user->email }}</td>
                  <td class="border-b px-4 py-2 text-sm"></td>
                  <td class="border-b px-4 py-2 text-sm"></td>
                  <td class="border-b px-4 py-2 text-sm"><button>アカウント停止</button></td>
                </tr>
                @endforeach

              </tbody>
            </table>
        </div>
    </div>
</body>

</html>
