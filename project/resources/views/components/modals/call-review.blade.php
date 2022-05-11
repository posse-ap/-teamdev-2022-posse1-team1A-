<div class="flex flex-col text-center py-12">
    <div class="text-left my-12 text-center pb-3 md:text-xl text-base">{{ $partnerUserName }}さんの評価をお願いします。</div>
    <form action="{{ route('chat.post_review') }}" method="post" class="">
        @csrf
        <input type="hidden" value="{{ $chatRoomId }}" name="chatRoomId">
        <input type="hidden" value="{{ $loginUserId }}" name="loginUserId">
        <div class="flex mb-5">
                <div class="w-2/4">
                    <div class="fill-salmon-400 text-center">
                        <svg class="ml-auto mr-auto" width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256.3 331.8C208.9 331.8 164.1 324.9 124.5 312.8C112.2 309 100.2 319.7 105.2 331.5C130.1 390.6 188.4 432 256.3 432C324.2 432 382.4 390.6 407.4 331.5C412.4 319.7 400.4 309 388.1 312.8C348.4 324.9 303.7 331.8 256.3 331.8H256.3zM226.5 231.6C229.8 230.5 232 227.4 232 224C232 206.1 225.3 188.4 215.4 175.2C205.6 162.2 191.5 152 176 152C160.5 152 146.4 162.2 136.6 175.2C126.7 188.4 120 206.1 120 224C120 227.4 122.2 230.5 125.5 231.6C128.7 232.7 132.3 231.6 134.4 228.8L134.4 228.8L134.6 228.5C134.8 228.3 134.1 228 135.3 227.6C135.1 226.8 136.9 225.7 138.1 224.3C140.6 221.4 144.1 217.7 148.3 213.1C157.1 206.2 167.2 200 176 200C184.8 200 194.9 206.2 203.7 213.1C207.9 217.7 211.4 221.4 213.9 224.3C215.1 225.7 216 226.8 216.7 227.6C217 228 217.2 228.3 217.4 228.5L217.6 228.8L217.6 228.8C219.7 231.6 223.3 232.7 226.5 231.6V231.6zM377.6 228.8C379.7 231.6 383.3 232.7 386.5 231.6C389.8 230.5 392 227.4 392 224C392 206.1 385.3 188.4 375.4 175.2C365.6 162.2 351.5 152 336 152C320.5 152 306.4 162.2 296.6 175.2C286.7 188.4 280 206.1 280 224C280 227.4 282.2 230.5 285.5 231.6C288.7 232.7 292.3 231.6 294.4 228.8L294.4 228.8L294.6 228.5C294.8 228.3 294.1 228 295.3 227.6C295.1 226.8 296.9 225.7 298.1 224.3C300.6 221.4 304.1 217.7 308.3 213.1C317.1 206.2 327.2 200 336 200C344.8 200 354.9 206.2 363.7 213.1C367.9 217.7 371.4 221.4 373.9 224.3C375.1 225.7 376 226.8 376.7 227.6C377 228 377.2 228.3 377.4 228.5L377.6 228.8L377.6 228.8z" />
                        </svg>
                    </div>
                    <p class="mt-5">良かった</p>
                    <input type="radio" class="border-black input-radio bg-gray-100" value="true" name="is_satisfied">
                </div>
                <div class="w-2/4">
                    <div class="fill-lightblue-300 text-center">
                        <svg class="ml-auto mr-auto" width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM159.3 388.7C171.5 349.4 209.9 320 256 320C302.1 320 340.5 349.4 352.7 388.7C355.3 397.2 364.3 401.9 372.7 399.3C381.2 396.7 385.9 387.7 383.3 379.3C366.8 326.1 315.8 287.1 256 287.1C196.3 287.1 145.2 326.1 128.7 379.3C126.1 387.7 130.8 396.7 139.3 399.3C147.7 401.9 156.7 397.2 159.3 388.7H159.3zM176.4 176C158.7 176 144.4 190.3 144.4 208C144.4 225.7 158.7 240 176.4 240C194 240 208.4 225.7 208.4 208C208.4 190.3 194 176 176.4 176zM336.4 240C354 240 368.4 225.7 368.4 208C368.4 190.3 354 176 336.4 176C318.7 176 304.4 190.3 304.4 208C304.4 225.7 318.7 240 336.4 240z" />
                        </svg>
                    </div>
                    <p class="mt-5">残念だった</p>
                    <input type="radio" class="border-black input-radio bg-gray-100" value="false" name="is_satisfied">
                </div>
        </div>
        <fieldset>
            <div class="ml-auto mr-auto w-4/5 h-30">
                <div class="text-left mb-3">理由</div>
                <label for="">
                    <input type="text" name="review_comment" 
                        class="bg-gray-100 text-left w-full bg-gray-100 rounded-md mb-5 h-12">
                </label>
                <button class="bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded  md:w-64 w-full mx-auto mb-5">
                    送信
                </button>
            </div>
        </fieldset>
    </form>
</div>
