<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Statistics: 
            <span class="text-slate-500">{{ $shortener->short }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <x-shortener-stats name="Ip Address" :data="$ip_address"/>
                <x-shortener-stats name="Browser" :data="$browser"/>
                <x-shortener-stats name="Platform" :data="$platform"/>
                <x-shortener-stats name="Device Type" :data="$device_type"/>
                @if ($referrer->count() > 0)
                    <x-shortener-stats name="Referrer" :data="$referrer"/>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
