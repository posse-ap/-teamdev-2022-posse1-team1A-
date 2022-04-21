<header id="header" class="sticky top-0 w-full bg-white bg-opacity-75 shadow-lg">
    <div id="base-header" class="px-10 py-3 flex items-center justify-between flex-shrink-0 items-center">
        <div id="header-logo" class="flex w-8 h-8 ml-0 mr-auto">
            <img src="img/logo-black.png" alt="logo-black.png">
            <p class="flex ml-2 items-center"><b>Anovey<b></p>
        </div>
        {{-- PC画面幅のheader ログイン前 --}}
        {{-- <div class="hidden flex-row-reverse ml-auto mr-0 md:flex items-center justify-between">
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
        </div> --}}

        {{-- PC画面幅のheader ログイン後 --}}

        <div class="hidden flex-row-reverse ml-auto mr-0 md:flex items-center justify-between">
            <buton class="flex items-center justify-center w-8 h-8 ml-5 overflow-hidden rounded-full cursor-pointer">
                <img src="https://assets.codepen.io/5041378/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1600304177&width=512"
                    alt="">
            </buton>
            <button
                class="relative bg-yellow-500 hover:bg-blue-700 text-white sm:text-base text-xs py-1 px-4 rounded ml-2">
                <div>
                    <span class="count" id="notifications-count">5</span>
                    <span class="fa fa-bell-o"></span>
                </div>
                <a href="">
                    回答者チャット
                </a>
            </button>

            <button
                class="relative bg-lightblue-500 hover:bg-gray-800 text-white sm:text-base text-xs py-1 px-4 rounded ml-2">
                <div>
                    <span class="count" id="notifications-count">3</span>
                    <span class="fa fa-bell-o"></span>
                </div>
                <a href="">
                    依頼者チャット
                </a>
            </button>
            <button class="hover:text-grey-800 font-bold py-1 px-4 ml-2">
                <a class="flex mx-2 text-sm font-semibold m-1 items-center" href="#">
                    初めての方へ
                </a>
            </button>
        </div>




        {{-- スマホ画面幅のheader ハンバーガーlogo ログイン前 --}}
        {{-- <div onclick="preLoginHamburgerClick()">
            <button class="md:hidden block">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" />
                </svg>
            </button>
        </div> --}}

        {{-- スマホ画面幅のheader ハンバーガーlogo ログイン後 --}}
        <div onclick="afterLoginHamburgerClick()">
            <button class="md:hidden block">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" />
                </svg>
            </button>
        </div>
    </div>


    {{-- ハンバーガーメニューログイン前 --}}
    {{-- <div id="prelogin-hamburger-index" class="hidden fixed bg-gray-700">
        <ul class="flex-grow mx-10">
            <li onclick="preLoginHamburgerClick()" class="mt-10"><svg class="mr-0 ml-auto fill-white"
                    width="30px" height="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path
                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                </svg></li>
            <li class="border-b"><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">初めての方へ</a>
            </li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">利用規約</a></li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">個人情報保護方針</a></li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">運営会社</a></li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">お問い合わせ</a></li>
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
    </div> --}}

    {{-- ハンバーガーメニューログイン後 --}}
    <div id="afterlogin-hamburger-index" class="hidden fixed bg-gray-700">
        <ul class="flex-grow mx-10">
            <li onclick="afterLoginHamburgerClick()" class="mt-10"><svg class="mr-0 ml-auto fill-white"
                    width="30px" height="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path
                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                </svg></li>
            </li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">初めての方へ</a></li>
            <li class="border-b"><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">アカウント情報</a>
            </li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">利用規約</a></li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">個人情報保護方針</a></li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">運営会社</a></li>
            <li><a class="block py-5 hover:bg-gray-300 rounded text-white" href="#">お問い合わせ</a></li>
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

</header>


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
