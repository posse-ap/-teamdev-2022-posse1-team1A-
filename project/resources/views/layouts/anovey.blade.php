<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        <title>転職者と企業を匿名で繋ぐマッチングプラットフォーム Anovey</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- TODO:開発終了後削除 --}}
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')
    </head>
    <body>
        @yield('content')
    </body>
</html>
