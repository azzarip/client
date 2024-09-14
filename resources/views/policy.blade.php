@extends('azzarip::base')

@section('body')
<div class="flex flex-row flex-1">
    <div class="w-[calc(50%-384px)] max-lg:hidden"></div>
    <main class="container flex-1 table text-xl">

<?php use Illuminate\Support\Facades\Request; ?>
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

    h1 {
        @apply h1;
    }
</style>

<div class="text-lg text-y text mt-10">
    {!! $content !!}
</div>
<div class="h-12"></div>
</div>
</main>
<div class="w-[calc(50%-384px)] max-lg:hidden"></div>
</div>
@endsection
