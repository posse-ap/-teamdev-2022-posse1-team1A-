@extends('layouts.anovey')
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.webrtc.ecl.ntt.com/skyway-4.4.4.js"></script>
@endpush

@section('content')
    @include('components.modals.call-screen')
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
                        const meta = document.getElementById('js-meta')
                        const sdkSrc = document.querySelector('script[src*=skyway]')
                        const localStream = await navigator.mediaDevices
                            .getUserMedia({
                                audio: true,
                                video: false,
                            })
                            .catch(console.error);
                        localVideo.muted = true;
                        localVideo.srcObject = localStream;
                        localVideo.playsInline = true;
                        await localVideo.play().catch(console.error);
                        const peer = new Peer('{{ $loginUserPeerId }}', {
                            key: '{{ $skyway_key }}',
                            debug: 3,
                        });
                        peer.on('open', () => {
                            peer.listAllPeers(function(list) {
                                console.log(list);
                            });
                            peer.once('open', id => localId);
                            const mediaConnection = peer.call(remoteId, localStream);
                            peer.on('call', mediaConnection => {
                                mediaConnection.answer(localStream);
                                mediaConnection.on('stream', async stream => {
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
