@extends('azzarip::base')

@section('body')
<div class="flex flex-row flex-1">
<main class="container flex-1 table max-w-xl mx-auto text-xl">

<style>
    .text a {
        color:#3030F1;
        text-decoration: underline #3030F1;
    }
    .text ul {
        list-style-position: inside;
        list-style-type: disc;
    }
    .text ul > * + * {
        margin-top: 12px;
    }
</style>

<div class="px-2 mt-10 text-lg text-y text">
    {!! $content !!}
</div>
<div class="h-12"></div>
</div>
</main>
<div class="w-[calc(50%-384px)] max-lg:hidden"></div>
</div>
@endsection
