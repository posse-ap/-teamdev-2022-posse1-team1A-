@extends('layouts.anovey')

@section('content')
    @include('components.user-header')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/chatMain.css') }}">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    @endpush
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.webrtc.ecl.ntt.com/skyway-4.4.4.js"></script>
    @endpush
    <div class="wrapper container mx-auto pl-4 mb-0 pb-0 bg-white font-normal">
        <div class='flex flex-wrap'>
            <div class="w-full lg:w-1/4 border-r border-zinc-300 side_nav">
                <ul class="mt-5 pt-5">
                    <a href="{{ $isClientChat ? route('chat.client_chat_list') : route('chat.respondent_chat_list') }}"
                        class="mt-5 pt-5">チャット一覧に戻る ></a>
                    <li class="mt-3">トークを退出する ></li>
                </ul>
            </div>
            <div class="w-full lg:w-3/4 box-content relative">
                <div class="p-5  bg-amber-100 text-xl flex justify-between">
                    <div class="font-bold">
                        {{ $partnerUserName }}
                    </div>
                    <div>
                        @if ($isReserved)
                            <button
                                class="bg-indigo-400 hover:bg-blue-700 text-white font-bold py-1 px-5 rounded ml-2 modal-open"
                                id="call-start">
                                <span class="px-3">
                                    通話
                                </span>
                            </button>
                        @else
                            <button disabled class="bg-gray-400 text-white font-bold py-1 px-5 rounded ml-2">
                                <span class="px-3">
                                    {{-- TODO:通話で10min経過してからモーダル表示に切り替える --}}
                                    通話
                                </span>
                            </button>
                        @endif
                        <button
                            class="bg-yellow-400 hover:bg-gray-800 text-white font-bold py-1 px-4 rounded ml-2 modal-open"
                            id="schedule-registration">
                            日程登録
                        </button>

                    </div>
                </div>
                <div class="cards mx-3 overflow-scroll">
                    <div id="scroll-inner">
                        @if ($isClientChat)
                            <div
                                class="fixed absolute right-0 card m-5 mr-8 p-3 bg-amber-100 w-72 rounded-md drop-shadow-md ml-auto">
                                日程が決まりましたら、<br>
                                日程登録ボタンを押してください。<br>
                                リマインドメールが送信されます。
                            </div>
                        @endif
                        <div class="spacer h-28"></div>
                        @foreach ($chatRecords as $key => $chatRecord)
                            @if ($chatRecord->user_id == $loginUserId)
                                <div class="card flex items-center justify-end">
                                    <div class="icon w-14 h-14">
                                    </div>
                                    <div class="time mt-auto mb-5">
                                        <span class="text-slate-400 block">{{ $chatRecord->date }}</span>
                                    </div>
                                    <div class="m-5 p-3 max-w-max bg-slate-100 rounded-full">
                                        {{ $chatRecord->comment }}
                                    </div>
                                </div>
                                {{-- チャットボット発言用の分岐 --}}
                            @elseif ($chatRecord->user_id == 3)
                                <div class="card flex items-center">
                                    <div class="icon w-14 h-14">
                                        <img src="{{ asset('img/anovey.png') }}" alt="">
                                    </div>
                                    <div class="m-5 p-3 max-w-max rounded-md border-2 rounded-full mr-1 bg-sky-100">
                                        {{ $chatRecord->comment }}
                                    </div>
                                    <div class="time mt-auto mb-5">
                                        <span class="text-slate-400">{{ $chatRecord->date }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="card flex items-center h-max">
                                    <div class="icon w-14 h-14">
                                        <img src="{{ asset($partnerUserIcon) }}" alt="依頼者ユーザーのアイコン">
                                    </div>
                                    <div class="m-5 p-3 max-w-max rounded-md border-2 rounded-full mr-1">
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
                        <button class="bg-gray-400 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">送信</button>
                    </div>
                </form>
                <div id="modal-content" class="md:w-2/4 w-4/5 rounded-2xl">
                    {{-- TODO:閉じるボタンをちゃんとデザインする --}}
                    <button id="modal-close">閉じる</button>
                    <div class="modal-inner" id="schedule-registration-modal">
                        @include('components.modals.schedule_registration')
                    </div>
                    {{-- <div class="modal-inner" id="call-start-modal">
                        @include('components.modals.call-start')
                    </div> --}}
                    <div class="modal-inner" id="ten-minute-announce-modal">
                        @include('components.modals.ten-minute-announce')
                    </div>
                    {{-- TODO:電話終了ボタンを押したら表示される↓ --}}
                    {{-- TODO: モーダルの外をクリックしても離脱させない仕組み必要 --}}
                    {{-- <div class="modal-inner" id="call-review-modal">
                        @include('components.modals.call-review')
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Using utilities: -->
        <button class="block bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded mx-auto mt-5">
            相談を受けつけない
        </button>
        {{-- <div class="mx-auto">
        </div> --}}
    </div>
    <div class="container">
        <h1 class="heading">P2P Media example</h1>
        <p class="note">
            Enter remote peer ID to call.
        </p>
        <div class="p2p-media">
            <div class="remote-stream">
                <video id="js-remote-stream"></video>
            </div>
            <div class="local-stream">
                <video id="js-local-stream"></video>
                <p>Your ID: <span id="js-local-id">{{ $loginUserPeerId }}</span></p>
                <input type="text" placeholder="Remote Peer ID" id="js-remote-id">
                <button id="js-call-trigger">Call</button>
                <button id="js-close-trigger">Close</button>
            </div>
        </div>
        <p class="meta" id="js-meta"></p>
    </div>
    @include('components.modals.call-screen')
    @push('scripts_bottom')
        <script>
            let target = document.getElementById('scroll-inner');
            target.scrollIntoView(false);
        </script>
        <script src="{{ asset('js/modal.js') }}"></script>
        <script>
            const Peer = window.Peer;
            (async function main() {
                const localVideo = document.getElementById('js-local-stream');
                const localId = '{{ $loginUserPeerId }}';
                const callTrigger = document.getElementById('js-call-trigger');
                const closeTrigger = document.getElementById('js-close-trigger');
                const remoteVideo = document.getElementById('js-remote-stream');
                const remoteId = '{{ $partnerUserPeerId }}'
                const meta = document.getElementById('js-meta');
                const sdkSrc = document.querySelector('script[src*=skyway]');
                meta.innerText = `
                UA: ${navigator.userAgent}
                SDK: ${sdkSrc ? sdkSrc.src : 'unknown'}
                `.trim();
                const localStream = await navigator.mediaDevices
                    .getUserMedia({
                        audio: true,
                        video: false,
                    })
                    .catch(console.error);
                // Render local stream
                localVideo.muted = true;
                localVideo.srcObject = localStream;
                localVideo.playsInline = true;
                await localVideo.play().catch(console.error);
                const peer = new Peer('{{ $loginUserPeerId }}', {
                    key: '{{ $skyway_key }}',
                    debug: 3,
                });
                // Register caller handler
                callTrigger.addEventListener('click', () => {
                    // Note that you need to ensure the peer has connected to signaling server
                    // before using methods of peer instance.
                    if (!peer.open) {
                        return;
                    }
                    const mediaConnection = peer.call(remoteId, localStream);
                    mediaConnection.on('stream', async stream => {
                        // Render remote stream for caller
                        remoteVideo.srcObject = stream;
                        remoteVideo.playsInline = true;
                        await remoteVideo.play().catch(console.error);
                    });
                    mediaConnection.once('close', () => {
                        remoteVideo.srcObject.getTracks().forEach(track => track.stop());
                        remoteVideo.srcObject = null;
                    });
                    closeTrigger.addEventListener('click', () => mediaConnection.close(true));
                });
                peer.once('open', id => localId);
                // Register callee handler
                peer.on('call', mediaConnection => {
                    mediaConnection.answer(localStream);
                    mediaConnection.on('stream', async stream => {
                        // Render remote stream for callee
                        remoteVideo.srcObject = stream;
                        remoteVideo.playsInline = true;
                        await remoteVideo.play().catch(console.error);
                    });
                    mediaConnection.once('close', () => {
                        remoteVideo.srcObject.getTracks().forEach(track => track.stop());
                        remoteVideo.srcObject = null;
                    });
                    closeTrigger.addEventListener('click', () => mediaConnection.close(true));
                });
                peer.on('error', console.error);
            })();
        </script>
    @endpush
@endsection
