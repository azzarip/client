@props(['bg' => null])
@extends('azzarip::base', ['bg' => $bg])

@section('body')
    <main class="flex-1"> @yield('main') </main>
@endsection
