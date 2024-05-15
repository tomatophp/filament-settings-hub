<x-filament-panels::page>
    @php
        $settings = \TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub::load()->groupBy('group')->reverse();
        $tenant = \Filament\Facades\Filament::getTenant();
    @endphp

    @if($tenant)
        @foreach($settings as $settingGroup=>$setting)

            <h1 class="text-lg font-bold tracking-tight md:text-3xl filament-header-heading">{{ str($settingGroup)->contains(['.','::']) ? trans($settingGroup) : $settingGroup }}</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($setting as $item)
                    <a href="{{ route($item->route, $tenant) }}" class="fi-ta-ctn flex flex-col justify-center items-center gap-2 p-4 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
                        <div class="p-2">
                            @if(isset($item->icon))
                                @if($item->color)
                                    <x-icon name="{{ $item->icon }}" class="w-16 h-16" style="color: {{ $item->color }}"/>
                                @else
                                    <x-icon name="{{ $item->icon }}" class="w-16 h-16"/>
                                @endif
                            @else
                                <x-heroicon-s-cog class="w-16 h-16"/>
                            @endif
                        </div>

                        <h1 class="font-bold text-lg">{{ str($item->label)->contains(['.','::']) ? trans($item->label) : $item->label }}</h1>
                        <p class="text-sm text-gray-400">{{ str($item->description)->contains(['.','::']) ? trans($item->description) : $item->description}}</p>
                    </a>
                @endforeach
            </div>
        @endforeach
    @else
        @foreach($settings as $settingGroup=>$setting)

            <h1 class="text-lg font-bold tracking-tight md:text-3xl filament-header-heading">{{ str($settingGroup)->contains(['.','::']) ? trans($settingGroup) : $settingGroup }}</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($setting as $item)
                    <a href="{{ route($item->route) }}" class="fi-ta-ctn flex flex-col justify-center items-center gap-2 p-4 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
                        <div class="p-2">
                            @if(isset($item->icon))
                                @if($item->color)
                                    <x-icon name="{{ $item->icon }}" class="w-16 h-16" style="color: {{ $item->color }}"/>
                                @else
                                    <x-icon name="{{ $item->icon }}" class="w-16 h-16"/>
                                @endif
                            @else
                                <x-heroicon-s-cog class="w-16 h-16"/>
                            @endif
                        </div>

                        <h1 class="font-bold text-lg">{{ str($item->label)->contains(['.','::']) ? trans($item->label) : $item->label }}</h1>
                        <p class="text-sm text-gray-400">{{ str($item->description)->contains(['.','::']) ? trans($item->description) : $item->description}}</p>
                    </a>
                @endforeach
            </div>
        @endforeach
    @endif
</x-filament-panels::page>
