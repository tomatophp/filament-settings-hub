<x-filament-panels::page>
    @php
        $settings = \TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub::load()->sortBy('order')->groupBy('group');
        $tenant = \Filament\Facades\Filament::getTenant();
    @endphp

    @foreach($settings as $settingGroup=>$setting)
        <x-filament::section heading="{{ str($settingGroup)->contains(['.','::']) ? trans($settingGroup) : $settingGroup }}"  class="fi-sc-section">
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1rem;">

            @foreach($setting as $item)
                @if($item->route)
                    @if(filament('filament-settings-hub')->isShieldAllowed())
                        @php
                            $page = null;
                            if(\Illuminate\Support\Facades\Route::getRoutes()->getRoutesByName()[$item->route]){
                                $page = str(\Illuminate\Support\Facades\Route::getRoutes()->getRoutesByName()[$item->route]->action['controller'])->afterLast('\\');
                            }
                            dd($page);
                        @endphp
                        @if($page && \Filament\Facades\Filament::auth()->user()->can('View:'.$page))

                            <x-filament::section style="text-align: center;">
                                <a href="{{ $tenant ? route($item->route, $tenant) : route($item->route) }}"  class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">
                                    <div style="display: flex; justify-content: center; align-items: center; padding: 0.5rem;">
                                        @if(isset($item->icon))
                                            @if($item->color)
                                                <x-icon name="{{ $item->icon }}"  style="color: {{ $item->color }}; height: 64px; width: 64px;"/>
                                            @else
                                                <x-icon name="{{ $item->icon }}"  style="height: 64px; width: 64px;"/>
                                            @endif
                                        @else
                                            <x-heroicon-s-cog style="height: 64px; width: 64px;"/>
                                        @endif
                                    </div>

                                    <h1 class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">{{ str($item->label)->contains(['.','::']) ? trans($item->label) : $item->label }}</h1>
                                    <p class="text-sm text-gray-400" style="font-size: 0.875rem">{{ str($item->description)->contains(['.','::']) ? trans($item->description) : $item->description}}</p>
                                </a>
                            </x-filament::section>
                        @endif
                    @else
                        <x-filament::section style="text-align: center;">
                            <a href="{{ $tenant ? route($item->route, $tenant) : route($item->route) }}" class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">
                                <div style="display: flex; justify-content: center; align-items: center; padding: 0.5rem;">
                                    @if(isset($item->icon))
                                        @if($item->color)
                                            <x-icon name="{{ $item->icon }}"  style="color: {{ $item->color }}; height: 64px; width: 64px;"/>
                                        @else
                                            <x-icon name="{{ $item->icon }}"  style="height: 64px; width: 64px;"/>
                                        @endif
                                    @else
                                        <x-heroicon-s-cog style="height: 64px; width: 64px;"/>
                                    @endif
                                </div>

                                <h1 class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">{{ str($item->label)->contains(['.','::']) ? trans($item->label) : $item->label }}</h1>
                                <p class="text-sm text-gray-400" style="font-size: 0.875rem">{{ str($item->description)->contains(['.','::']) ? trans($item->description) : $item->description}}</p>
                            </a>
                        </x-filament::section>
                    @endif
                @elseif($item->page)
                    @if(filament('filament-settings-hub')->isShieldAllowed())
                        @if(\Filament\Facades\Filament::auth()->user()->can('View:'.str($item->page)->afterLast('\\')))
                            <x-filament::section style="text-align: center;">
                                <a href="{{ app($item->page)::getUrl() }}" class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">
                                    <div style="display: flex; justify-content: center; align-items: center; padding: 0.5rem;">
                                        @if(isset($item->icon))
                                            @if($item->color)
                                                <x-icon name="{{ $item->icon }}"  style="color: {{ $item->color }}; height: 64px; width: 64px;"/>
                                            @else
                                                <x-icon name="{{ $item->icon }}"  style="height: 64px; width: 64px;"/>
                                            @endif
                                        @else
                                            <x-heroicon-s-cog style="height: 64px; width: 64px;"/>
                                        @endif
                                    </div>

                                    <h1 class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">{{ str($item->label)->contains(['.','::']) ? trans($item->label) : $item->label }}</h1>
                                    <p class="text-sm text-gray-400" style="font-size: 0.875rem">{{ str($item->description)->contains(['.','::']) ? trans($item->description) : $item->description}}</p>
                                </a>
                            </x-filament::section>
                        @endif
                    @else
                        <x-filament::section style="text-align: center;">
                            <a href="{{ app($item->page)::getUrl() }}" class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">
                                <div style="display: flex; justify-content: center; align-items: center; padding: 0.5rem;">
                                    @if(isset($item->icon))
                                        @if($item->color)
                                            <x-icon name="{{ $item->icon }}"  style="color: {{ $item->color }}; height: 64px; width: 64px;"/>
                                        @else
                                            <x-icon name="{{ $item->icon }}"  style="height: 64px; width: 64px;"/>
                                        @endif
                                    @else
                                        <x-heroicon-s-cog style="height: 64px; width: 64px;"/>
                                    @endif
                                </div>

                                <h1 class="font-bold text-lg" style="font-size: 1.25rem; font-weight: 600;">{{ str($item->label)->contains(['.','::']) ? trans($item->label) : $item->label }}</h1>
                                <p class="text-sm text-gray-400" style="font-size: 0.875rem">{{ str($item->description)->contains(['.','::']) ? trans($item->description) : $item->description}}</p>
                            </a>
                        </x-filament::section>
                    @endif
                @endif
            @endforeach
            </div>

        </x-filament::section>
    @endforeach
</x-filament-panels::page>
