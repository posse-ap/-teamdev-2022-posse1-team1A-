<div class="flex flex-col text-center py-12">
    <div class="text-left my-12 text-center pb-3 md:text-xl text-base">通話を開始します。<br class="md:hidden block">よろしいですか？</div>
    <div class="flex">
        <button class="mr-5 bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded w-64 mx-auto mb-5">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('chat.call_screen', ['chat_id' => $chatRoomId]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="partner_user_name" value="{{ $partnerUserName }}">
                <input type="submit" value='通話'>
            </form>
        </button>
        <button class="bg-gray-500 hover:bg-gray-800 text-white font-bold py-2 rounded  w-64 mx-auto mb-5"
            id="modal-close">
            キャンセル
        </button>
    </div>
</div>
