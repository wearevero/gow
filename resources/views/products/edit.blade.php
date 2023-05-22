<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit: {{  $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{  $product->name }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update your account's profile information and email address.") }}
                    </p>
                </header>

                <form action="{{ route('products.update', $product) }}" method="post">
                    @method('put')
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full"
                                        type="text"
                                        name="name"
                                        :value="old('name', $product->name)"
                                        required />
            
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    {{-- <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="name" class="block mt-1 w-full"
                                        type="number"
                                        name="price"
                                        :value="old('price', $product->price)"
                                        required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div> --}}
                    <div class="mt-4">
                        <x-input-label for="short_url_key" :value="__('Price')" />
                        <div class="focus-within:border-indigo-500 focus-within:ring-indigo-500 rounded-md overflow-hidden shadow-sm border flex items-stretch divide-x divide-slate-300 border-slate-300 mt-1 focus:right-1 focus-within:ring-1">
                            <div class="px-2 bg-slate-50 flex items-center justify-center">
                                <span class="text-slate-500">{{ 'Rp.' }}</span>
                            </div>
                            <input id="price" class="block mt-1 w-full border-0 focus:ring-offset-0 focus:ring-0 focus:outline-none"
                                            type="number"
                                            name="price"
                                            value="{{ old('price', $product->price) }}"
                                            required
                                            />
                        </div>
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="short_url_key" :value="__('Short URL Key')" />
                        <div class="focus-within:border-indigo-500 focus-within:ring-indigo-500 rounded-md overflow-hidden shadow-sm border flex items-stretch divide-x divide-slate-300 border-slate-300 mt-1 focus:right-1 focus-within:ring-1">
                            <div class="px-2 bg-slate-50 flex items-center justify-center">
                                <span class="text-slate-500">{{ config('app.domain_shortener') . '/' }}</span>
                            </div>
                            <input id="name" class="block mt-1 w-full border-0 focus:ring-offset-0 focus:ring-0 focus:outline-none"
                                            type="text"
                                            name="short_url_key"
                                            value="{{ old('short_url_key', $product->short_url_key) }}"
                                            />
                        </div>
                        <x-input-error :messages="$errors->get('short_url_key')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full"
                                        type="text"
                                        name="description"
                                        :value="old('description', $product->description)"
                                        required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="block mt-4">
                        <label for="is_shortened" class="inline-flex items-center">
                            <input id="is_shortened" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_shortened">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Generate short url') }}</span>
                        </label>
                    </div>
                    <x-primary-button class="mt-4">
                        Update
                    </x-primary-button>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
