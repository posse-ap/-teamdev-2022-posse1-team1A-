@extends('layouts.anovey')

@section('content')
    @include('components.user-header')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/chatMain.css') }}">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <style>
            .calling-modal {
                position: absolute;
                top: 0;
                display: none;
                z-index: 2;
            }

            .modal-load {
                margin: 0;
                padding: 20px;
                background: #fff;
                position: fixed;
                display: none;
                z-index: 2;
            }

            .cards {
                height: calc(100vh - 215px);
            }

            @media screen and (max-width: 1023.5px) {
                .side_nav {
                    display: none;
                }
            }

        </style>
    @endpush
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.webrtc.ecl.ntt.com/skyway-4.4.4.js"></script>
    @endpush
    <main class="bg-gray-50">
        <div class="mx-auto w-full md:w-4/5 bg-white font-normal">
            <div class='flex flex-wrap'>
                <div class="w-full lg:w-1/4 border-r border-zinc-300 side_nav">
                    @if ($isClientChat)
                        <div class="bg-gray-700 py-2 px-3 w-min rounded-full mx-auto mt-8">
                            <div class="flex">
                                <div class="w-5 h-5 mr-1">
                                    <img src="{{ asset('img/ticket-white.png') }}" alt="チケットアイコン" class="w-full h-full">
                                </div>
                                <p class="text-white whitespace-nowrap text-base">チケット所持数：{{ $ticket_counts }}枚</p>
                            </div>
                        </div>
                    @endif
                    <ul class="p-5 @if ($isClientChat) mt-5 @else mt-16 @endif">
                        <li class="border-b border-t">
                            <a href="{{ $isClientChat ? route('chat.client_chat_list') : route('chat.respondent_chat_list') }}"
                                class="block py-5">チャット一覧に戻る</a>
                        </li>
                        {{-- TODO:トーク退出機能 --}}
                        {{-- <li class="mt-3">トークを退出する</li> --}}
                    </ul>
                </div>
                <div class="w-full lg:w-3/4 box-content relative">
                    <div class="p-3 md:p-5 bg-gray-700 text-white text-base md:text-xl flex justify-between items-center">
                        <p class="font-bold h-min">
                            {{ $partnerUserName }}
                        </p>
                        <div class="text-base flex">
                            @if ($isReserved)
                                <button
                                    class="bg-lightblue-500 hover:bg-blue-600 text-white font-bold py-1 px-8 rounded ml-2 modal-open"
                                    id="call-start">
                                    通話
                                </button>
                            @else
                                <button disabled class="bg-gray-300 text-white font-bold py-1 px-8 rounded ml-2">
                                    {{-- TODO:通話で10min経過してからモーダル表示に切り替える --}}
                                    通話
                                </button>
                            @endif
                            @if ($isReserved)
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-4 rounded ml-2 modal-open"
                                    id="schedule-change-or-cancel">
                                    日程変更
                                </button>
                            @else
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-4 rounded ml-2 modal-open"
                                    id="schedule-registration">
                                    日程登録
                                </button>
                            @endif
                            <button onclick="dropdownOpen()"
                                class="block relative p-2 text-gray-700 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 focus:ring-blue-300 focus:ring focus:outline-none ml-2 lg:hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                            <div v-show="isOpen" id="dropdown"
                                class="hidden absolute right-0 top-16 z-10 w-48 mt-2 bg-white rounded-md shadow-xl">
                                @if ($isClientChat)
                                    <p
                                        class="px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform border-b">
                                        チケット所持数：{{ $ticket_counts }}枚
                                    </p>
                                @endif
                                <a href="{{ $isClientChat ? route('chat.client_chat_list') : route('chat.respondent_chat_list') }}"
                                    class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform hover:bg-gray-100">
                                    チャット一覧に戻る
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="cards mx-3 overflow-scroll text-sm">
                        <div id="scroll-inner">
                            @if ($isClientChat)
                                <div
                                    class="fixed absolute right-0 card sm:m-5 sm:mr-8 p-3 bg-gray-50 w-full sm:w-min sm:rounded-md drop-shadow-md ml-auto text-xs md:text-sm">
                                    @if (!$isReserved)
                                        <p class="whitespace-nowrap">
                                            日程が決まりましたら<br class="hidden sm:block">日程登録ボタンを押してください。<br>
                                            リマインドメールが送信されます。
                                        </p>
                                    @else
                                        <p class="md:text-center whitespace-nowrap">
                                            相談日程：{{ $interview_schedule->schedule->format('Y/m/d H:i') }}
                                        </p>
                                    @endif
                                </div>
                            @else
                                @if ($isReserved)
                                    <div
                                        class="fixed absolute right-0 card sm:m-5 sm:mr-8 p-3 bg-gray-50 w-full sm:w-min sm:rounded-md drop-shadow-md ml-auto text-xs md:text-sm">
                                        <p class="md:text-center whitespace-nowrap">
                                            相談日程：{{ $interview_schedule->schedule->format('Y/m/d H:i') }}
                                        </p>
                                    </div>
                                @endif
                            @endif
                            <div class="spacer h-28"></div>
                            @foreach ($chatRecords as $key => $chatRecord)
                                @if ($chatRecord->user_id == $loginUserId)
                                    <div class="card flex items-center justify-end">
                                        <div class="icon w-12 h-12 rounded-full overflow-hidden">
                                        </div>
                                        <div class="time mt-auto mb-5">
                                            <span class="text-slate-400 block">{{ $chatRecord->date }}</span>
                                        </div>
                                        <div class="m-5 p-3 max-w-max bg-slate-100 rounded-3xl">
                                            {{ $chatRecord->comment }}
                                        </div>
                                    </div>
                                    {{-- チャットボット発言用の分岐 --}}
                                @elseif ($chatRecord->user_id == 3)
                                    <div class="card flex items-center">
                                        <div class="icon w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                                            <img src="{{ asset('img/anovey.png') }}" alt="" class="w-full h-full">
                                        </div>
                                        <div class="m-5 p-3 max-w-max border-2 rounded-3xl mr-1 bg-sky-100">
                                            {{ $chatRecord->comment }}
                                        </div>
                                        <div class="time mt-auto mb-5">
                                            <span class="text-slate-400">{{ $chatRecord->date }}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="card flex items-center h-max">
                                        <div class="icon w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                                            <img src="{{ asset($partnerUserIcon) }}" alt="依頼者ユーザーのアイコン"
                                                class="w-full h-full">
                                        </div>
                                        <div class="m-5 p-3 max-w-max border-2 rounded-3xl mr-1">
                                            {{ $chatRecord->comment }}
                                        </div>
                                        <div class="time mt-auto mb-5">
                                            @if ($chatRecord->is_read)
                                                <span class="text-slate-400 block text-right">既読</span>
                                            @endif
                                            <span class="text-slate-400">{{ $chatRecord->date }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <form action="" method="POST" class="flex items-center">
                        @csrf
                        <input type="hidden" value="{{ $chatRoomId }}" name="chatRoomId">
                        <input type="text" class="block m-5 bg-slate-100 rounded-full w-full" name="comment">
                        <div class="icon w-28">
                            <button class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-3 rounded">送信</button>
                        </div>
                    </form>
                </div>
                <div id="modal-content" class="md:w-2/4 w-11/12 rounded-2xl">
                    <button id="modal-close"
                        class="ml-auto block text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="modal-inner" id="schedule-registration-modal">
                        @include('components.modals.schedule_registration')
                    </div>
                    <div class="modal-inner" id="schedule-change-modal">
                        @include('components.modals.schedule_change')
                    </div>
                    <div class="modal-inner" id="schedule-cancel-modal">
                        @include('components.modals.schedule_cancel')
                    </div>
                    <div class="modal-inner" id="schedule-change-or-cancel-modal">
                        @include('components.modals.schedule_change_or_cancel')
                    </div>
                    <div class="modal-inner" id="call-start-modal">
                        @include('components.modals.call-start')
                    </div>
                    @isset($call)
                        <div class="modal-inner" id="call-review-modal">
                            @include('components.modals.call-review')
                        </div>
                    @endisset
                </div>
                {{-- 依頼者かつチケットがない時モーダル表示 --}}
                @if ($isClientChat && !$have_tickets)
                    <div id="modal-load" class="md:w-2/4 w-11/12 rounded-2xl block modal-load">
                        <div class="modal-inner" id="buy-ticket-modal">
                            @include('components.modals.buy-ticket')
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (!$isClientChat)
            <div id="calling-modal" class="calling-modal">
                @include('components.modals.call-screen')
            </div>
        @endif
    </main>
    @push('scripts_bottom')
        <script>
            let target = document.getElementById('scroll-inner');
            target.scrollIntoView(false)

            function dropdownOpen() {
                let dropdown = document.getElementById('dropdown');
                // dropdown.classList.toggle('block');
                if (dropdown.style.display == "block") {
                    // noneで非表示
                    dropdown.style.display = "none";
                } else {
                    // blockで表示
                    dropdown.style.display = "block";
                }
            }
        </script>
        <script src="{{ asset('js/modal.js') }}"></script>
        @if (!$isClientChat)
            <script>
                //センタリングを実行する関数
                function centeringModalSyncer() {

                    //画面(ウィンドウ)の幅、高さを取得
                    var w = $(window).width();
                    var h = $(window).height();

                    // コンテンツ(#modal-content)の幅、高さを取得
                    // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
                    var cw = $("#modal-content").outerWidth();
                    var ch = $("#modal-content").outerHeight();

                    //センタリングを実行する
                    $("#modal-content").css({
                        "left": ((w - cw) / 2) + "px",
                        "top": ((h - ch) / 2) + "px"
                    });
                }
                const Peer = window.Peer;

                (async function main() {
                    const localVideo = document.getElementById('js-local-stream')
                    const localId = '{{ $loginUserPeerId }}'
                    const callTrigger = document.getElementById('js-call-trigger')
                    const closeTrigger = document.getElementById('js-close-trigger')
                    const remoteVideo = document.getElementById('js-remote-stream')
                    const remoteId = '{{ $partnerUserPeerId }}'
                    const sdkSrc = document.querySelector('script[src*=skyway]')
                    const callingTime = document.getElementById('calling-time')
                    const localStream = await navigator.mediaDevices
                        .getUserMedia({
                            audio: true,
                            video: false,
                        })
                        .catch(console.error)
                    // Render local stream
                    localVideo.muted = true
                    localVideo.srcObject = localStream
                    localVideo.playsInline = true
                    await localVideo.play().catch(console.error)
                    const peer = new Peer('{{ $loginUserPeerId }}', {
                        key: '{{ $skyway_key }}',
                        debug: 3,
                    })
                    // Register caller handler
                    callTrigger.addEventListener('click', () => {
                        // Note that you need to ensure the peer has connected to signaling server
                        // before using methods of peer instance.
                        if (!peer.open) {
                            return
                        }
                        $("#calling-modal").show()
                        $("#modal-content,#modal-overlay").fadeOut("slow", function() {
                            $('#modal-overlay').remove()
                        })
                        let timer
                        const startTime = new Date()
                        // タイマー開始
                        startTimer()

                        function startTimer() {
                            timer = setInterval(showSecond, 1000)
                        }

                        // 秒数表示
                        function showSecond() {

                            let nowTime = new Date()

                            var elapsedTime = (nowTime - startTime) / 1000
                            let min = Math.floor(elapsedTime / 60)
                            let rem = Math.floor(elapsedTime) % 60
                            var str = `${min}:${rem}`

                            callingTime.innerHTML = str
                            if (elapsedTime >= 540) {
                                callingTime.style.color = '#ff0000'
                            }
                            if (elapsedTime >= 600) {
                                mediaConnection.close(true)
                            }
                        }
                        const mediaConnection = peer.call(remoteId, localStream)
                        mediaConnection.on('stream', async stream => {
                            // Render remote stream for caller
                            remoteVideo.srcObject = stream
                            remoteVideo.playsInline = true
                            await remoteVideo.play().catch(console.error)
                        })
                        mediaConnection.once('close', () => {
                            remoteVideo.srcObject.getTracks().forEach(track => track.stop())
                            remoteVideo.srcObject = null
                            clearInterval(timer)
                            $("#calling-modal").hide()
                            $(".modal-inner").hide()
                            $("#call-review-modal").show()
                            $("body").append('<div id="modal-overlay"></div>')
                            $("#modal-overlay").fadeIn("slow")

                            $("#modal-content").fadeIn("slow")
                            centeringModalSyncer()
                        })
                        closeTrigger.addEventListener('click', () => {
                            mediaConnection.close(true)
                        })
                    })
                    peer.once('open', id => localId)
                    peer.on('error', console.error)
                })()
            </script>
        @endif
        @if ($isClientChat && !$have_tickets)
            <script>
                $(function() {
                    //ロード時処理
                    $(window).on('load', function() {
                        //キーボード操作などにより、オーバーレイが多重起動するのを防止する
                        $(this).blur(); //ボタンからフォーカスを外す
                        if ($("#modal-overlay")[0]) return false; //新しくモーダルウィンドウを起動しない (防止策1)

                        //オーバーレイを出現させる
                        $("body").append('<div id="modal-overlay"></div>');
                        $("#modal-overlay").fadeIn("slow");

                        //コンテンツをセンタリングする
                        centeringModalSyncer();

                        //コンテンツをフェードインする
                        $("#modal-load").fadeIn("slow");

                    });

                    //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
                    $(window).resize(centeringModalSyncer);

                    //センタリングを実行する関数
                    function centeringModalSyncer() {

                        //画面(ウィンドウ)の幅、高さを取得
                        var w = $(window).width();
                        var h = $(window).height();

                        // コンテンツ(#modal-load)の幅、高さを取得
                        // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
                        var cw = $("#modal-load").outerWidth();
                        var ch = $("#modal-load").outerHeight();

                        //センタリングを実行する
                        $("#modal-load").css({
                            "left": ((w - cw) / 2) + "px",
                            "top": ((h - ch) / 2) + "px"
                        });
                    }
                });
            </script>
        @endif
    @endpush
@endsection
