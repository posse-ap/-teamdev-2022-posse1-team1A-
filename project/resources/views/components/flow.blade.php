<section class="bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-center text-lg lg:text-4xl mb-10">
            <span class="text-blue text-base lg:text-2xl inline-block md:mb-3">Flow</span><br>
            ご利用の流れ
        </h2>
        <div class="bg-white p-8 md:px-10 md:py-12 shadow">
            <div class="md:flex items-center">
                <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                    <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">01</p>
                    <p class="md:w-8/12 text-base lg:text-base">アカウント新規作成</p>
                </div>
                <p class="md:w-6/12 font-thin text-sm lg:text-base">
                    {{-- TODO: 新規登録画面のリンクを貼る --}}
                    <a href="" class="text-navy font-bold underline">新規登録画面</a>よりアカウントを作成してください。
                </p>
            </div>
        </div>
        <div class="triangle mx-auto my-4 md:my-8"></div>
        <div class="bg-white p-8 md:px-10 md:py-12 shadow">
            <div class="md:flex items-center">
                <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                    <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">02</p>
                    <p class="md:w-8/12 text-base lg:text-base">チケット購入</p>
                </div>
                <p class="md:w-6/12 font-thin text-sm lg:text-base">
                    当サービスにて通話相談を開始するには、事前に購入したチケット(1回1200円)が必要となります。<br>
                    チケットの購入は<a href={{ route('user_ticket') }} class="text-navy font-bold underline">こちら</a>。
                </p>
            </div>
        </div>
        <div class="triangle mx-auto my-4 md:my-8"></div>
        <div class="bg-white p-8 md:px-10 md:py-12 shadow">
            <div class="md:flex items-center">
                <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                    <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">03</p>
                    <p class="md:w-8/12 text-base lg:text-base">マッチング</p>
                </div>
                <p class="md:w-6/12 font-thin text-sm lg:text-base">
                    検索バーから依頼者様自身の希望にあった回答者を検索し、チャット形式で相談を開始します。
                </p>
            </div>
        </div>
        <div class="triangle mx-auto my-4 md:my-8"></div>
        <div class="bg-white p-8 md:px-10 md:py-12 shadow">
            <div class="md:flex items-center">
                <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                    <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">04</p>
                    <p class="md:w-8/12 text-base lg:text-base">日程調整</p>
                </div>
                <p class="md:w-6/12 font-thin text-sm lg:text-base">
                    相談を希望する回答者の方とチャットで日程調整をし、相談をする日時を決定します。
                </p>
            </div>
        </div>
        <div class="triangle mx-auto my-4 md:my-8"></div>
        <div class="bg-white p-8 md:px-10 md:py-12 shadow">
            <div class="md:flex items-center">
                <div class="flex items-end md:items-center md:w-6/12 mb-3 md:mb-0">
                    <p class="text-blue md:w-4/12 text-3xl lg:text-5xl mr-3 md:mr-0">05</p>
                    <p class="md:w-8/12 text-base lg:text-base">10分間の相談</p>
                </div>
                <p class="md:w-6/12 font-thin text-sm lg:text-base">
                    当日になりましたら、チャット画面の通話ボタンにて相談を開始します。
                </p>
            </div>
        </div>
    </div>
</section>