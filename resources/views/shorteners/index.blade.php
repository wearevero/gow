<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shorteners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($shorteners as $shortener)
                    <x-card>
                        <span class="text-slate-500 text-sm">
                            {{ $shortener->short }}
                            <p class="line-clamp-1 mb-4">
                                {{ $shortener->original }}
                            </p>
                        </span>
                            <x-primary-anchor href="{{ route('shorteners.stats', $shortener) }}">
                                View stats
                            </x-primary-anchor>
                    </x-card>
                @endforeach
            </div>
            @if($shorteners->hasPages())
                <div class="mt-8">
                    {{ $shortener->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
