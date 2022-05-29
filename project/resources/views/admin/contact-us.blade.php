@extends('layouts.anovey')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
    <main class="bg-grey-100 w-full">
        <div class="flex">
            @include('components.admin-bar')

            <div class="w-full mx-5">
                <h1 class="text-5xl py-12 text-blue-800">お問合せ内容</h1>
                <iframe class="border" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQKil712xekqHitfmeyb78LkSM4eGNvcVEexShVjEBJ6qCfad4tsJ_ZfGv7d41yv4M-LGEK6GOC3eGk/pubhtml?widget=true&amp;headers=false" width="100%" height="677"></iframe>

            </div>
        </div>
    </main>
@endsection
