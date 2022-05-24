<div class="flex flex-col text-center py-8">
    <div class="mb-5 font-bold text-lg">相談日程をキャンセルしますか？</div>
    <div class="mb-8">変更前相談日程 : {{ $interview_schedule ? "{$interview_schedule->schedule}~" : '' }}
    </div>
    <form action="{{ route('chat.schedule_cancel', ['chat_id' => $chatRoomId]) }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $interview_schedule ? $interview_schedule->id : '' }}"
            name="interview_schedule_id">
        <div class="flex flex-wrap mb-5 max-w-sm mx-auto">
            <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 rounded w-36 mx-auto mb-5">
                日程をキャンセル
            </button>
        </div>
    </form>
    <p class="text-xs">※ 日程の再調整やキャンセルを繰り返すと、アカウントが停止される可能性があります。</p>
</div>
