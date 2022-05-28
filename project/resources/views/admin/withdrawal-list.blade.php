@extends('layouts.anovey')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    <main class="bg-grey-100 w-full">
        <div class="flex">
            @include('components.admin-bar')

            <div class="w-full mx-5">
                <h1 class="text-5xl py-12 text-blue-800">退会理由一覧</h1>
                <div class="w-full">
                    <table class="table pt-5 h-5/6 w-full">
                        <thead class="bg-lightblue-200">
                            <tr class="text-left">
                                <th class="w-2/12 p-2 text-xs">本名</th>
                                <th class="w-2/12 p-2 text-xs">登録名</th>
                                <th class="w-2/12 p-2 text-xs">会社名（部署名）</th>
                                <th class="w-2/12 p-2 text-xs">メールアドレス</th>
                                <th class="w-4/12 p-2 text-xs">退会理由</th>
                            </tr>
                        </thead>
                        <tbody class="w-full">
                            @foreach ($users as $user)
                                <tr class="bg-white w-full">
                                    <td class="border-b p-2 text-sm">{{ $user->name }}</td>
                                    <td class="border-b p-2 text-sm">{{ $user->nickname }}</td>
                                    <td class="border-b p-2 text-sm">{{ $user->company }}（{{ $user->department }}）</td>
                                    <td class="border-b p-2 text-sm">{{ $user->email }}</td>
                                    <td class="border-b p-2 text-sm">{{ $user->reason }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $users->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
