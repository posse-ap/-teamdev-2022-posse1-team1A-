<div class="flex flex-col text-center py-12">
    <p class="text-left my-10 text-center lg:text-xl text-base">
        チケット未所持のため、<br>
        依頼者チャット機能をご利用いただけません。<br>
        チケットを購入してください。
    </p>
    <p>現在のチケット数：{{ $is_ticket }}</p>
    <div class="mt-10">
        <a
            href="{{ route('user_ticket') }}"
            class="block mx-auto py-2 w-full md:w-3/5 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            チケットを購入する
        </a>
    </div>
</div>
