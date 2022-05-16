@extends('layouts.anovey')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endpush
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.webrtc.ecl.ntt.com/skyway-4.4.4.js"></script>
@endpush

@section('content')
    @include('components.modals.call-screen')
    <div id="modal-content" class="md:w-2/4 w-4/5 rounded-2xl">
        {{-- TODO:閉じるボタンをちゃんとデザインする --}}
        <button id="modal-close">閉じる</button>
        <div class="modal-inner" id="ten-minute-announce-modal">
            @include('components.modals.ten-minute-announce')
        </div>
        {{-- TODO:電話終了ボタンを押したら表示される↓ --}}
        {{-- TODO: モーダルの外をクリックしても離脱させない仕組み必要 --}}
        <div class="modal-inner" id="call-review-modal">
            @include('components.modals.call-review')
        </div>
    </div>
    @push('scripts_bottom')
        <script src="{{ asset('js/modal.js') }}"></script>
        <script>
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
                peer.once('open', id => localId)
                // Register callee handler
                peer.on('call', mediaConnection => {
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
                            // TODO:10分経過モーダル出す
                        }
                    }
                    mediaConnection.answer(localStream)
                    mediaConnection.on('stream', async stream => {
                        // Render remote stream for callee
                        remoteVideo.srcObject = stream
                        remoteVideo.playsInline = true
                        await remoteVideo.play().catch(console.error)
                    })
                    mediaConnection.once('close', () => {
                        remoteVideo.srcObject.getTracks().forEach(track => track.stop())
                        remoteVideo.srcObject = null
                        clearInterval(timer)
                    })
                    closeTrigger.addEventListener('click', () => mediaConnection.close(true))
                })
                peer.on('error', console.error)
            })()
        </script>
    @endpush
@endsection
