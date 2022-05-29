<div class="table top-0 text-center bg-gray-700 h-screen w-screen wrapper px-4 pb-5 z-40">

    <div class="md:block table-cell">
        <div
            class="flex bg-white text-center md:w-80 w-52 md:h-80 h-52 ml-auto mr-auto overflow-hidden rounded-full my-12">
            <img src="{{ asset($partnerUserIcon) }}" alt="通話相手のアイコン" class="ml-auto mr-auto text-center">
        </div>
        <div class="text-center text-white text-6xl mb-5">{{ $partnerUserName }}</div>
        <p class="text-white text-4xl text-center" id="calling-time">発信中</p>

        @if (!$isRespondent && $call->calling_time == 0)
            <form action="{{ route('chat.call_cancel', ['calling_id' => $call->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $call->id }}">
                <button class="mt-10 md:mt-5 w-1/12 bg-white rounded-full cursor-pointer" id="js-close-trigger">
                    <img class="w-full" src="{{ asset('img/end-call.png') }}" alt="end-call-button">
                </button>
            </form>
        @else
            <button class="mt-10 md:mt-5 w-1/12 bg-white rounded-full cursor-pointer" id="js-close-trigger">
                <img class="w-full" src="{{ asset('img/end-call.png') }}" alt="end-call-button">
            </button>
        @endif
        <video id="js-remote-stream"></video>
        <video id="js-local-stream"></video>
    </div>
</div>
