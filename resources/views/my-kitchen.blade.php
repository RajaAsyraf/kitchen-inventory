<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Kitchen') }} @ {{ $kitchen->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($kitchen->items as $item)
                        {{ $loop->iteration }}. {{ $item->name }}
                        <span class="text-gray-500"><small>(Expired at {{ $item->expired_at }})</small></span>
                        <span class="float-right">{{ $item->quantity }} {{ $item->unit }}</span>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>