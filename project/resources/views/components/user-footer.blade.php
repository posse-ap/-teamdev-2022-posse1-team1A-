<footer class="footer px-10 bg-gray-500 w-full px-10 py-5">
    <div class="flex items-center justify-between flex-shrink-0">
        <a class="" href="">
            <div class=" w-8 h-8 ml-0 mr-1 w-3/12 flex">
                <img src="{{ asset('img/logo-black.png') }}" alt="logo-black.png">
                <p class="flex ml-2 text-white items-center border-r pr-4 footer-logo">Anovey</p>
            </div>
        </a>
        <div class="md:flex justify-between w-full">
            <div class="flex justify-between md:w-full lg:w-6/12">
                <a class="w-6/12" href="{{ route('terms_of_service') }}">
                    <p class=" flex text-white h-8 items-center text-xs hover:text-gray-800 justify-center">
                        利用規約
                    </p>
                </a>
                <a class="w-6/12" href="{{ route('privacy_policy') }}">
                    <p class=" flex text-white h-8 items-center text-xs hover:text-gray-800 justify-center">
                        個人情報保護方針
                    </p>
                </a>
            </div>
            <div class="flex justify-between md:w-full lg:w-6/12">
                <a class="w-6/12" href="">
                    <p class=" flex text-white h-8 items-center text-xs hover:text-gray-800 justify-center">
                        運営会社
                    </p>
                </a>
                <a class="w-6/12" href="">
                    <p class=" flex text-white h-8 items-center text-xs hover:text-gray-800 justify-center">
                        お問い合わせ
                    </p>
                </a>
            </div>
        </div>
    </div>
</footer>
