@extends('layouts.anovey')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    <main class="bg-grey-100 w-full">
        <div class="flex">
            @include('components.admin-bar')

            <div class="w-full mx-5">
                <h1 class="text-5xl py-12 text-blue-800">通話相互評価内容確認</h1>

                <div class="flex">
                    <div class="bg-white block py-5 shadow rounded-lg mb-5 w-1/4">
                        <h2 class="text-blue-800 text-lg pl-5">総合満足度</h2>
                        <div class="flex">
                            <div class="flex px-12 items-end text-center ml-auto mr-auto my-4">
                                <p class="text-blue-800 text-6xl font-bold">{{ $comprehensive }}</p>
                                <p class="text-blue-800 ml-2 text-2xl">%</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white block py-5 shadow rounded-lg mb-5 w-1/4 mx-5">
                        <h2 class="text-blue-800 text-lg pl-5">依頼者満足度</h2>
                        <div class="flex">
                            <div class="flex px-12 items-end text-center ml-auto mr-auto my-4">
                                {{-- TODO:実際の値入れる --}}
                                <p class="text-blue-800 text-6xl font-bold">89</p>
                                <p class="text-blue-800 ml-2 text-2xl">%</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white block py-5 shadow rounded-lg mb-5 w-1/4">
                        <h2 class="text-blue-800 text-lg pl-5">匿名回答者満足度</h2>
                        <div class="flex">
                            <div class="flex px-12 items-end text-center ml-auto mr-auto my-4">
                                {{-- TODO:実際の値入れる --}}
                                <p class="text-blue-800 text-6xl font-bold">89</p>
                                <p class="text-blue-800 ml-2 text-2xl">%</p>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($evaluations as $evaluation)
                    <div class="bg-white p-8 rounded-lg shadow mb-5">
                        <table class="w-full mb-3">
                            <tr>
                                <th class="w-2/12 text-left">通話日時</th>
                                <td>{{ $evaluation->calling->created_at }}~</td>
                            </tr>
                            <tr>
                                <th class="w-2/12 text-left">通話時間</th>
                                <td>{{ floor($evaluation->calling->calling_time/60) }}分{{ $evaluation->calling->calling_time%60 }}秒</td>
                            </tr>
                        </table>
                        <table class="w-full mb-3">
                            <tr>
                                <th class="w-2/12 text-left">依頼者</th>
                                {{-- TODO:実際の値入れる --}}
                                <td>荒木 龍松<span class="text-sm">(arashiyama@gmail.com)</span></td>
                            </tr>
                            <tr>
                                <th class="w-2/12 text-left">満足度</th>
                                {{-- TODO:実際の値入れる --}}
                                <td>満足</td>
                            </tr>
                            <tr>
                                <th class="w-2/12 text-left">理由</th>
                                {{-- TODO:実際の値入れる --}}
                                <td>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</td>
                            </tr>
                        </table>
                        <table class="w-full mb-3">
                            <tr>
                                <th class="w-2/12 text-left">匿名回答者</th>
                                {{-- TODO:実際の値入れる --}}
                                <td>大木田 悟 <span class="text-sm">(okida@gmail.com)</span></td>
                            </tr>
                            <tr>
                                <th class="w-2/12 text-left">満足度</th>
                                {{-- TODO:実際の値入れる --}}
                                <td>満足</td>
                            </tr>
                            <tr>
                                <th class="w-2/12 text-left">理由</th>
                                {{-- TODO:実際の値入れる --}}
                                <td>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                <div class="mb-3">
                    {{ $evaluations->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
