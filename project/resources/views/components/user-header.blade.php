<header id="header" class="sticky top-0 w-full bg-white bg-opacity-75 shadow-lg z-50">
    <div id="base-header" class="px-10 py-3 flex items-center justify-between flex-shrink-0 items-center">
        <div id="header-logo" class="w-8 h-8 ml-0 mr-auto">
            <a href="{{ route('user_index') }}" class="flex">
                <img src="{{ asset('img/logo-black.png') }}" alt="logo-black.png">
                <p class="flex ml-2 text-xl items-center"><b>Anovey<b></p>
            </a>
        </div>

        {{-- PC画面幅のheader --}}
        @if (Auth::check())
            {{-- ログイン後 --}}
            <div class="hidden flex-row-reverse ml-auto mr-0 md:flex items-center justify-between">
                <a href="{{ route('user_page') }}"
                    class="flex items-center justify-center w-8 h-8 ml-5 overflow-hidden rounded-full cursor-pointer">
                    <img src="{{ asset(App\Models\User::find(Auth::id())->icon) }}" alt="ユーザーのアイコン" class="h-full w-full">
                </a>
                <button
                    class="relative bg-yellow-500 hover:bg-yellow-600 text-white sm:text-base text-xs py-1 px-4 rounded ml-2">
                    <div>
                        <?php $respondent_sum = 0; ?>
                        @foreach (App\Models\User::find(Auth::id())->respondent_chats as $respondent_chat)
                            <?php $respondent_sum += $respondent_chat->number_of_unread_items(); ?>
                        @endforeach
                        @if ($respondent_sum !== 0)
                            <span class="count" id="notifications-count">
                                {{ $respondent_sum }}
                            </span>
                            <span class="fa fa-bell-o"></span>
                        @endif
                    </div>
                    <a href="{{ route('chat.respondent_chat_list') }}">
                        回答者チャット
                    </a>
                </button>

                <button
                    class="relative bg-lightblue-500 hover:bg-blue-600 text-white sm:text-base text-xs py-1 px-4 rounded ml-2">
                    <div>
                        <?php $client_sum = 0; ?>
                        @foreach (App\Models\User::find(Auth::id())->client_chats as $client_chat)
                            <?php $client_sum += $client_chat->number_of_unread_items(); ?>
                        @endforeach
                        @if ($client_sum !== 0)
                            <span class="count" id="notifications-count">
                                {{ $client_sum }}
                            </span>
                            <span class="fa fa-bell-o"></span>
                        @endif
                    </div>
                    <a href="{{ route('chat.client_chat_list') }}">
                        依頼者チャット
                    </a>
                </button>
                <button class="hover:text-grey-800 font-bold py-1 pr-3">
                    <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="{{ route('user_ticket') }}">
                        チケット購入
                    </a>
                </button>
                <button class="hover:text-grey-800 font-bold py-1 pr-3">
                    <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="{{ route('user_beginner') }}">
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
                    class="bg-blue-800 hover:bg-blue-900 text-white sm:text-base text-xs font-bold py-1 px-4 rounded ml-2">
                    <a href="{{ route('register') }}">
                        新規登録
                    </a>
                </button>
                <button
                    class="bg-gray-500 hover:bg-gray-600 text-white sm:text-base text-xs font-bold py-1 px-4 rounded ml-2">
                    <a href="{{ route('login') }}">
                        ログイン
                    </a>
                </button>
                <button class="hover:text-grey-800 font-bold py-1 px-4 ml-2">
                    <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="{{ route('user_beginner') }}">
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
    @if (Auth::check())
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
                        href="{{ route('user_beginner') }}">初めての方へ</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('user_ticket') }}">チケット購入</a>
                </li>
                <li class="border-b"><a
                        class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800  rounded text-white"
                        href="{{ route('user_page') }}">アカウント情報</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('terms_of_service') }}">利用規約</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('privacy_policy') }}">個人情報保護方針</a></li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">運営会社</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('contact-us') }}">お問い合わせ</a>
                </li>
            </ul>
            <div class="flex w-screen">
                <a href="{{ route('chat.client_chat_list') }}" class="block bg-lightblue-500 p-5 hover:bg-blue-600 text-white sm:text-base text-sm font-bold w-6/12">
                    <div class="flex mx-auto w-min items-center">
                        <span class="whitespace-nowrap">
                            依頼者チャット
                        </span>
                        <?php $client_sum = 0; ?>
                        @foreach (App\Models\User::find(Auth::id())->client_chats as $client_chat)
                            <?php $client_sum += $client_chat->number_of_unread_items(); ?>
                        @endforeach
                        @if ($client_sum !== 0)
                            <div class="bg-red-600 rounded-full w-5 h-5 ml-1">
                                <span class="block text-white w-full h-full sm:leading-tight text-center">{{ $client_sum }}</span>
                            </div>
                        @endif
                    </div>
                </a>
                <a href="{{ route('chat.respondent_chat_list') }}" class="bg-yellow-500 p-5 hover:bg-yellow-600 text-white sm:text-base text-sm font-bold w-6/12">
                    <div class="flex mx-auto w-min items-center">
                        <span class="whitespace-nowrap">
                            回答者チャット
                        </span>
                        <?php $respondent_sum = 0; ?>
                        @foreach (App\Models\User::find(Auth::id())->respondent_chats as $respondent_chat)
                            <?php $respondent_sum += $respondent_chat->number_of_unread_items(); ?>
                        @endforeach
                        @if ($respondent_sum !== 0)
                            <div class="bg-red-600 rounded-full w-5 h-5 ml-1">
                                <span class="block text-white w-full h-full sm:leading-tight text-center">{{ $respondent_sum }}</span>
                            </div>
                        @endif
                    </div>
                </a>
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
                        href="{{ route('user_beginner') }}">初めての方へ</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('privacy_policy') }}">個人情報保護方針</a></li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="#">運営会社</a>
                </li>
                <li><a class="block py-5 pl-2 hover:bg-gray-300 hover:text-gray-800 rounded text-white"
                        href="{{ route('contact-us') }}">お問い合わせ</a>
                </li>
            </ul>
            <div class="flex w-screen">
                <a href="{{ route('login') }}"
                    class="bg-gray-500 p-5 hover:bg-gray-600 text-white sm:text-base text-sm font-bold w-6/12 text-center">
                    ログイン
                </a>
                <a href="{{ route('register') }}"
                    class="bg-blue-800 p-5 hover:bg-blue-900 text-white sm:text-base text-sm font-bold w-6/12 text-center">
                    新規登録
                </a>
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
