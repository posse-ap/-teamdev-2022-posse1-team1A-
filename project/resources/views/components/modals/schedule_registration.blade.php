<div class="flex flex-col text-center p-8">
    <div class="mb-5 font-bold text-lg">相談日程の登録</div>
    <div class="text-left mb-3">相談日程</div>
    <form action="" method="post">
        @csrf
        <label>
            <input type="datetime-local" name="" class="w-full rounded-sm bg-gray-100 text-left mb-5">
        </label>
        <button class="bg-indigo-400 hover:bg-blue-700 text-white font-bold py-2 rounded w-64 mx-auto mb-5">
            チケットを1枚消費して登録
        </button>
    </form>
    <p class="text-xs">※ 日程を登録するとチケットが1枚消費されます。</p>
    <p class="text-xs">※ 日程の再調整やキャンセルを繰り返すと、アカウントが停止される可能性があります。</p>
</div>
