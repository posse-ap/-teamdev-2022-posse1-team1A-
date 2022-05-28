<div class="w-1/5 bg-blue-900 min-h-screen">
    <ul class="flex-grow">
        <div class="w-15 h-15 mt-3 flex mx-5">
            <img src="{{ asset('img/logo-white.png') }}" alt="logo-black.png">
            <p class="ml-0 text-3xl text-white flex items-center font-bold">Anovey</p>
        </div>
        <li class="mx-5 border-b"><a class="block py-5 pl-2 rounded text-white" href="#">管理者ページ</a>
        </li>
        <li><a class="block mx-5 py-5 pl-2 mt-10 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                href="{{ route('admin.index') }}">各種指標</a>
        </li>
        <li><a class="block mx-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                href="{{ route('admin.userlist') }}">ユーザー一覧</a>
        </li>
        <li><a class="block mx-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                href="{{ route('admin.contact-us') }}">お問合せ内容</a>
        </li>
        <li><a class="block mx-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                href="{{ route('admin.call_evaluation') }}">通話評価</a>
        </li>
        <li><a class="block mx-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                href="#">通話一覧</a>
        </li>
        <li><a class="block mx-5 py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white text-xs"
                href="#">退会理由一覧</a>
        </li>
    </ul>
</div>
