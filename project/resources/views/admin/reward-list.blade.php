@extends('layouts.anovey')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    <main class="bg-grey-100 w-full">
        <div class="flex">
            @include('components.admin-bar')

            <div class="w-full mx-5">
                <h1 class="text-5xl py-12 text-blue-800">報酬支払いページ</h1>
                <div class="w-full">
                    <table class="table pt-5 h-5/6 w-full">
                        <thead class="bg-lightblue-200">
                            <tr class="text-left">
                                <th class="w-2/12 p-2 text-xs">本名（登録名）</th>
                                <th class="w-2/12 p-2 text-xs">電話番号</th>
                                <th class="w-2/12 p-2 text-xs">お支払金額</th>
                                <th class="w-2/12 p-2 text-xs">通話時期</th>
                                <th class="w-2/12 p-2 text-xs">支払いステータス</th>
                                <th class="w-2/12 p-2 text-xs"></th>
                            </tr>
                        </thead>
                        <tbody class="w-full">
                            @foreach ($rewards as $reward)
                                <tr class="bg-white w-full">
                                    <td class="border-b p-2 text-sm">
                                        {{ $reward->user->name }}（{{ $reward->user->nickname }}）</td>
                                    <td class="border-b p-2 text-sm">{{ $reward->user->telephone_number }}</td>
                                    <td class="border-b p-2 text-sm">{{ $reward->amount_of_payment }}円</td>
                                    <td class="border-b p-2 text-sm">{{ $reward->created_at->format('Y年m月') }}</td>
                                    <td class="border-b p-2 text-sm font-bold">
                                        @if ($reward->is_paid)
                                            <span>支払い済み</span>
                                        @else
                                            <span class="text-red-500">未支払い</span>
                                        @endif
                                    </td>
                                    <td class="border-b p-2 text-sm font-bold">
                                        @if (!$reward->is_paid)
                                            {{-- 未支払いの時 --}}
                                            <form action="{{ route('admin.reward_list_paid') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $reward->id }}">
                                                <button type="submit" value="支払い済みにする"
                                                    class="bg-blue-900 w-4/5 px-2 py-1 rounded text-white btn-stop">支払い済みにする</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $rewards->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('scripts_bottom')
        <script>
            $(function() {
                $(".btn-stop").click(function() {
                    if (confirm("本当に支払いが完了しましたか？")) {
                        //そのままsubmit（削除）
                    } else {
                        //cancel
                        return false;
                    }
                });
            });
        </script>
    @endpush
@endsection
