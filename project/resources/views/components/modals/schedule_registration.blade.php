<div class="flex flex-col text-center py-8">
    <div class="mb-5 font-bold text-lg">相談日程の登録</div>
    <div class="text-left mb-3">相談日程<span class="text-red-600">*</span></div>
    <form action="{{ route('chat.schedule', $chatRoomId) }}" method="POST">
        @csrf
        <input type="hidden" name="chatRoomId" value="{{ $chatRoomId }}">
        <label>
            <input type="datetime-local" name="schedule"
                class="w-full rounded-sm bg-gray-100 text-left @error('schedule') border border-solid border-red-500 @enderror">
        </label>
        @error('schedule')
            <p class="text-red-500 text-xs text-left mt-2">{{ $message }}</p>
        @enderror
        <button class="bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded w-64 mx-auto my-5">
            チケットを1枚消費して登録
        </button>
    </form>
    <p class="text-xs">※ 日程を登録するとチケットが1枚消費されます。</p>
    <p class="text-xs">※ 日程の再調整やキャンセルを繰り返すと、アカウントが停止される可能性があります。</p>
</div>
