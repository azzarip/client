@props(['bg' => null])
@extends('azzarip::base', ['bg' => $bg])

@section('body')
    <main class="flex-1 max-md:px-2"> @yield('main') </main>
@endsection
