<aside id="cookies-policy" x-data="{ 'expand': false }" x-show="$wire.show"
    data-text="{{ json_encode(__('a::cookies.details')) }}">
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-20 bg-black/10">
        <div class="fixed bottom-0 w-full max-w-4xl px-4 pt-4 bg-white pointer-events-auto rounded-t-md">
            <div class="max-w-4xl mx-auto">
                <h2 class="mb-1 font-semibold text-center font-xl">@lang('a::cookies.title')</h2>
                <div class="max-lg:text-xs xl:text-sm">
                    <p>Wir und ausgewählte Dritte verwenden Cookies oder ähnliche Technologien für technische Zwecke
                        und mit Ihrer Zustimmung auch für Erfahrungs-, Mess- und Marketingzwecke (mit
                        personalisierter Werbung), wie in der <a href="{{ route('cookie-policy') }}">Cookie-Policy</a>
                        angegeben.</p>
                    <p>In Bezug auf Werbung können wir und ausgewählte Dritte präzise Standortdaten und
                        Gerätekennungen verwenden, um Informationen auf einem Gerät zu speichern und/oder darauf
                        zuzugreifen und personenbezogene Daten wie Ihre Nutzungsdaten zu verarbeiten. Weitere Informationen finden Sie in unserer
                        <a href="{{ route('cookie-policy') }}" class="inline-link">Cookie Policy</a>.</p>
                    <p class="max-lg:hidden">Sie können Ihre Zustimmung frei geben, ablehnen oder widerrufen,
                        jederzeit, indem Sie auf das Präferenzpanel zugreifen. Wenn Sie Ihre Zustimmung geben, gilt
                        sie nur für diese Domain. Die Verweigerung der Zustimmung kann die entsprechenden Funktionen
                        möglicherweise unzugänglich machen.</p>
                    <p class="max-lg:hidden">Verwenden Sie die Schaltfläche "Alles akzeptieren", um zuzustimmen.
                        Verwenden Sie die Schaltfläche "Nur notwendige", um ohne Zustimmung fortzufahren.</p>
                </div>
                <div class="flex flex-col max-w-5xl gap-5 my-4 lg:flex-row">
                    <form wire:submit="acceptEssentials" class="w-full">
                        <button type="submit" class="w-full p-2 text-black bg-white border border-black rounded-md">
                            Nur notwendige
                        </button>
                    </form>
                    <form wire:submit="acceptAll" class="w-full">
                        <button type="submit"
                            class="w-full p-2 text-white bg-green-700 border border-green-700 rounded-md">
                            Alle akzeptieren
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex flex-row justify-center w-full gap-4 py-2 align-bottom border-t cursor-pointer"
                @click="expand = ! expand">
                <span class="font-semibold text-center">@lang('a::cookies.customize')</span>
                <x-heroicon-s-chevron-up class="w-6 svg" x-cloak x-show="expand" />
                <x-heroicon-s-chevron-down class="w-6 svg" x-show="!expand" />
            </div>

            <div x-show="expand" x-cloak id="cookies-policy-customize" class="mx-auto overflow-auto max-h-[450px]">
                <form wire:submit="acceptSelected" class="w-11/12 px-2 mx-auto mb-5 space-y-4 lg:px-5">
                    <label for="essentials" class="relative block">
                        <div class="flex flex-row justify-between mx-auto">
                            <span class="font-semibold lg:pl-5">@lang('a::cookies.categories.essentials.title')</span>
                            <div class="flex items-center justify-center">
                                <div class="block switch">
                                    <input type="checkbox" class="" checked disabled>
                                    <span class="slider round" style="bg"></span>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2">@lang('a::cookies.categories.essentials.description')</p>
                    </label>

                    @foreach ($cookieCategories as $category)

                            <div class="flex flex-row justify-between mx-auto">
                                <span class="font-semibold lg:pl-5">@lang('a::cookies.categories.' . $category . '.title')</span>
                                <label class="switch">
                                    <input type="checkbox" wire:model='selected' value="{{ $category }}">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <p class="mt-2">@lang('a::cookies.categories.' . $category . '.description')</p>

                    @endforeach
                    <button type="submit"
                        class="block w-full p-2 mx-auto text-white bg-green-700 border border-green-700 rounded-md">
                        Einstellungen Speichern
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

@script
    <script>
        $wire.on('cookie_consented', () => {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
            'event': 'updated_cookie_consent'
            });
        });
    </script>
@endscript

@assets
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 26px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 0px;
            bottom: 0px;
            background-color: white;
            border: gray solid 2px;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: rgb(74, 222, 128);
        }

        input:disabled+.slider {
            background-color: rgba(74, 222, 128, 0.4);
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        input:disabled {
            background-color: rgba(74, 222, 128, 0.4);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endassets
