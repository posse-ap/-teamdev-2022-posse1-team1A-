@extends('layouts.anovey')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endpush

@section('content')
    @include('components.user-header')
    <div class="w-4/5 py-7 mx-auto">

      <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScXhUdidM8jRqgv6arhfG-CEOnzKHMwjHAQq4d6aiX5yCvEJA/viewform?embedded=true" width="100%" height="677" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </div>
    @include('components.user-footer')
@endsection
