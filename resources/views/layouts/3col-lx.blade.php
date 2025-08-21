@extends('azzarip::layouts.base')

@section('body')
<div class="flex flex-row flex-1">
    <aside class="w-[calc(50%-300px)] max-lg:hidden">@yield('aside-left')</aside>
    <main class="flex-1 table max-md:px-2 wrapper"> @yield('main') </main>
    <aside class="w-[calc(50%-468px)] max-lg:hidden">@yield('aside-right')</aside>
</div>
@endsection


