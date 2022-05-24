<div class="flex flex-col text-center py-5 md:py-12">
    <div class="text-left my-5 md:my-12 text-center pb-3 md:text-xl text-lg">通話を開始します。<br class="md:hidden block">よろしいですか？</div>
    <div class="flex justify-between w-full md:w-10/12 mx-auto">
        @if ($isClientChat)
            <form action="{{ route('chat.call_start', ['chat_id' => $chatRoomId]) }}" method="post" class="w-5/12">
                @csrf
                <input type="hidden" value="{{ $chatRoomId }}" name="chat_id">
                <button class="mr-5 bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded w-full mx-auto mb-5"
                    type="submit">
                    通話
                </button>
            </form>
        @else
            {{-- TODO: 通話始まってなかったら押せないようにする --}}
            <button class="mr-5 bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded w-5/12 mb-5"
                id="js-call-trigger" type="button">
                通話
            </button>
        @endif
        <button class="bg-gray-500 hover:bg-gray-800 text-white font-bold py-2 rounded  w-5/12 mb-5"
            id="modal-close">
            キャンセル
        </button>
    </div>
</div>
