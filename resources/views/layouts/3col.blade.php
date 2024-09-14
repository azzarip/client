@extends('azzarip::base')

@section('body')
<div class="flex flex-row flex-1">
    <aside class="w-[calc(50%-384px)] max-lg:hidden">@yield('aside-left')</aside>
    <main class="container flex-1 table text-xl"> @yield('main') </main>
    <aside class="w-[calc(50%-384px)] max-lg:hidden">@yield('aside-right')</aside>
</div>
@endsection
