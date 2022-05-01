<header id="header" class="sticky top-0 w-full bg-white bg-opacity-75 shadow-lg">
    <div id="base-header" class="px-10 py-3 flex items-center justify-between flex-shrink-0 items-center">
        <div id="header-logo" class="flex w-8 h-8 ml-0 mr-auto">
            <img src="{{ asset('img/logo-black.png') }}" alt="logo-black.png">
            <p class="flex ml-2 text-xl items-center"><b>Anovey<b></p>
        </div>

        {{-- 一旦ログインステータスを1に --}}
        {{-- TODO:ログイン機能実装後、削除↓ --}}
        <?php $account_status_id = 0; ?>

        {{-- PC画面幅のheader --}}
        @if ($account_status_id == 0)
            {{-- ログイン後 --}}
            <div class="hidden flex-row-reverse ml-auto mr-0 md:flex items-center justify-between">
                <button
                    class="flex items-center justify-center w-8 h-8 ml-5 overflow-hidden rounded-full cursor-pointer">
                    <img src="https://assets.codepen.io/5041378/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1600304177&width=512"
                        alt="">
                </button>
                <button
                    class="relative bg-yellow-500 hover:bg-yellow-700 text-white sm:text-base text-xs py-1 px-4 rounded ml-2">
                    <div>
                        <span class="count" id="notifications-count">5</span>
                        <span class="fa fa-bell-o"></span>
                    </div>
                    <a href="">
                        回答者チャット
                    </a>
                </button>

                <button
                    class="relative bg-lightblue-500 hover:bg-blue-700 text-white sm:text-base text-xs py-1 px-4 rounded ml-2">
                    <div>
                        <span class="count" id="notifications-count">3</span>
                        <span class="fa fa-bell-o"></span>
                    </div>
                    <a href="">
                        依頼者チャット
                    </a>
                </button>
                <button class="hover:text-grey-800 font-bold py-1 pr-3">
                    <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="{{ route('user_ticket') }}">
                        チケット購入
                    </a>
                </button>
                <button class="hover:text-grey-800 font-bold py-1 pr-3">
                    <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="#">
                        初めての方へ
                    </a>
                </button>
            </div>

            <div onclick="afterLoginHamburgerClick()">
                <button class="md:hidden block">
                    <div>
                        <img src="{{ asset('img/hamburger-icon.png') }}" alt="cross-icon.png" class="mr-0 ml-auto">
                    </div>
                </button>
            </div>
        @else
            {{-- ログイン前 --}}
            <div class="hidden md:flex flex-row-reverse ml-auto mr-0 items-center justify-between">
                <button
                    class="bg-blue-800 hover:bg-blue-700 text-white sm:text-base text-xs font-bold py-1 px-4 rounded ml-2">
                    <a href="">
                        新規登録
                    </a>
                </button>
                <button
                    class="bg-gray-500 hover:bg-gray-800 text-white sm:text-base text-xs font-bold py-1 px-4 rounded ml-2">
                    <a href="">
                        ログイン
                    </a>
                </button>
                <button class="hover:text-grey-800 font-bold py-1 px-4 ml-2">
                    <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="#">
                        初めての方へ
                    </a>
                </button>
            </div>
            <div onclick="preLoginHamburgerClick()">
                <button class="md:hidden block">
                    <div>
                        <img src="{{ asset('img/hamburger-icon.png') }}" alt="cross-icon.png" class="mr-0 ml-auto">
                    </div>
                </button>
            </div>
        @endif
    </div>

    {{-- スマホページ用のHeader --}}
    @if ($account_status_id == 0)
        {{-- ログイン後 --}}

        <div id="afterlogin-hamburger-index" class="hidden fixed bg-gray-700">
            <ul class="flex-grow mx-10">
                <li onclick="afterLoginHamburgerClick()" class="mt-10">
                    <div class="fill-white text-right">
                        <img src="{{ asset('img/cross-icon.png') }}" alt="cross-icon.png" class="mr-0 ml-auto">
                    </div>
                </li>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">初めての方へ</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('user_ticket') }}">チケット購入</a>
                </li>
                <li class="border-b"><a
                        class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800  rounded text-white"
                        href="#">アカウント情報</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">利用規約</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">個人情報保護方針</a></li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">運営会社</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">お問い合わせ</a>
                </li>
            </ul>
            <div class="flex w-screen">
                <button class="bg-lightblue-500 p-5 hover:bg-gray-800 text-white sm:text-base text-sm font-bold w-6/12">
                    <a href="">
                        依頼チャット
                    </a>
                </button>
                <button class="bg-yellow-500 p-5 hover:bg-blue-700 text-white sm:text-base text-sm font-bold w-6/12">
                    <a href="">
                        匿名回答チャット
                    </a>
                </button>
            </div>
        </div>
    @else
        {{-- ログイン前 --}}
        <div id="prelogin-hamburger-index" class="hidden fixed bg-gray-700">
            <ul class="flex-grow mx-10">
                <li onclick="preLoginHamburgerClick()" class="mt-10">
                    <div class="fill-white text-right">
                        <img src="{{ asset('img/cross-icon.png') }}" alt="cross-icon.png" class="mr-0 ml-auto">
                    </div>
                </li>
                <li class="border-b"><a
                        class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">初めての方へ</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">個人情報保護方針</a></li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">運営会社</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">お問い合わせ</a>
                </li>
            </ul>
            <div class="flex w-screen">
                <button class="bg-gray-500 p-5 hover:bg-gray-800 text-white sm:text-base text-sm font-bold w-6/12">
                    <a href="">
                        ログイン
                    </a>
                </button>
                <button class="bg-blue-800 p-5 hover:bg-blue-700 text-white sm:text-base text-sm font-bold w-6/12">
                    <a href="">
                        新規登録
                    </a>
                </button>
            </div>
        </div>
    @endif

</header>


@push('scripts')
    <script>
        function preLoginHamburgerClick() {
            const Header = document.getElementById("header");
            Header.classList.toggle('bg-gray-700');
            Header.classList.toggle('bg-opacity-75');

            const baseHeader = document.getElementById("base-header");
            baseHeader.classList.toggle('hidden');

            const headerLogo = document.getElementById("header-logo");
            headerLogo.classList.toggle('invisible');

            const hamburgerIndex = document.getElementById("prelogin-hamburger-index");
            hamburgerIndex.classList.toggle('hidden');
            hamburgerIndex.classList.toggle('flex');
            hamburgerIndex.classList.toggle('flex-col');
            hamburgerIndex.classList.toggle('min-h-screen');
        }

        function afterLoginHamburgerClick() {
            const Header = document.getElementById("header");
            Header.classList.toggle('bg-gray-700');
            Header.classList.toggle('bg-opacity-75');

            const baseHeader = document.getElementById("base-header");
            baseHeader.classList.toggle('hidden');

            const headerLogo = document.getElementById("header-logo");
            headerLogo.classList.toggle('invisible');

            const hamburgerIndex = document.getElementById("afterlogin-hamburger-index");
            hamburgerIndex.classList.toggle('hidden');
            hamburgerIndex.classList.toggle('flex');
            hamburgerIndex.classList.toggle('flex-col');
            hamburgerIndex.classList.toggle('min-h-screen');
        }
    </script>
@endpush
