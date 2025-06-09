@props(['nav' => true, 'center' => null])

<div>
@if($nav)
<header>
<div class="flex items-stretch justify-between content-baseline {{ $headerClass ?? null }}">
    @if($center == 'header')
    <div class="w-1/3 max-xl:hidden"></div>
    @endif
    <div class="{{ $center == 'header'  ? 'w-1/3 justify-center' : 'w-1/4 justify-end' }}">
        @yield('header')
    </div>
    <div class="flex {{ $center == 'menu'  ? 'w-1/2 justify-center' : ($center == 'header' ? 'w-1/3 justify-end' : 'w-1/2 justify-center') }} mt-3 max-xl:hidden">
        <nav>
            @yield('big-menu')
        </nav>
    </div>
    @if($center == 'menu')
    <div class="w-1/4 max-xl:hidden"></div>
    @endif

    <div class="flex justify-between pt-2 xl:hidden">
        <div>
            <div class="py-3 pr-3" x-data="{ open: false, dashboard: false }">
                <div class="text-center cursor-pointer w-fit">
                    <x-heroicon-s-bars-3 class="inline w-11 h-11" x-show="!open" @click="open = true" />
                </div>
                <div x-show="open" class="fixed top-0 bottom-0 left-0 right-0 z-10 bg-black/50" x-cloak>
                    <div x-show="open"
                        x-transition:enter="transition duration-500"
                        x-transition:enter-start="transform translate-x-full"
                        x-transition:enter-end="transform translate-x-0"
                        x-transition:leave="transition duration-500"
                        x-transition:leave-start="transform"
                        x-transition:leave-end="transform translate-x-full"
                        class="fixed top-0 bottom-0 right-0 z-20 w-2/3 bg-white md:w-1/3" @click.outside="open = false">

                        <x-heroicon-s-x-mark
                            class="right-0 block w-10 h-10 p-2 mt-2 ml-auto mr-2 text-black bg-white rounded-full link"
                            @click="open = false" />
                        @yield('small-menu')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
@endif

{{ $slot }}
</div>

@hasSection('footer')
    @yield('footer')
@else
    <x-footer />
@endif
