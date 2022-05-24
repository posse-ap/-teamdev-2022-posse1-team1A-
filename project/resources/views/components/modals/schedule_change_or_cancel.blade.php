<div class="flex flex-col text-center py-8">
    <div class="mb-5 font-bold text-lg">相談日程の変更</div>
    <div class="mb-8">変更前相談日程：@if ($isReserved) {{ $interview_schedule->schedule->format('Y/m/d H:i') }} @endif</div>
    {{-- TODO: feature/118マージ後コメントアウトを解除 --}}
    <form action="{{ route('chat.schedule', $chatRoomId) }}" method="POST">
    {{-- <form action="" method="POST"> --}}
    @csrf
        <div class="flex flex-wrap mb-5 max-w-sm mx-auto">
            <button class="bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded w-36 mx-auto mb-5 modal-open" id="schedule-change">
                変更
            </button>
            <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 rounded w-36 mx-auto mb-5 modal-open" id="schedule-cancel">
                キャンセル
            </button>
        </div>
    </form>
    <p class="text-xs">※ 日程の再調整やキャンセルを繰り返すと、アカウントが停止される可能性があります。</p>
</div>