@props(['bg' => 'bg-grey-50/50', 'nav' => true])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <meta name="referrer" content="no-referrer-when-downgrade">
    @if (isset($seo))
        {!!  seo($seo) !!}
    @else
        <title>{{ site('name') }}</title>
        <meta name="robots" content="noindex">
        <meta name="robots" content="nofollow">
        <meta name="robots" content="noarchive">
    @endif
    <x-tagmanager-head />
    @stack('head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @googlefonts

    @foreach(site('fonts') as $font)
    @if($font) @googlefonts($font) @endif
    @endforeach

</head>

<body class="{{ $bg }}">
    <x-tagmanager-body />

    <div class="flex flex-col justify-between min-h-screen">
    <x-theme :$nav >
        @yield('body')
    </x-theme>
    </div>

    @if(config('client.cookie-consent'))
        @livewire('cookie-consent')
    @endif
    @stack('scripts')
    @livewireScripts
    @auth
        <x-modals::logout />
    @endauth
</body>
</html>
