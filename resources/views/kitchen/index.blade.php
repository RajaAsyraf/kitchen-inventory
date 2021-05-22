<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Kitchen') }} @ {{ $kitchen->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex items-center bg-gray-100 dark:bg-gray-900">
                    <div class="container mx-auto">
                        <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                            <div class="p-5 bg-white rounded shadow-sm">
                                <div class="text-base text-gray-400 ">Expired In 3 Months</div>
                                <div class="flex items-center pt-1">
                                    <div class="text-2xl font-bold text-gray-900 ">{{ $kitchen->stats['expiredInThreeMonth'] }} item{{ $kitchen->stats['expiredInThreeMonth'] > 1 ? 's' : '' }}</div>
                                    <!-- <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <span>1.8%</span>
                                    </span> -->
                                </div>
                            </div>
                            <div class="p-5 bg-white rounded shadow-sm">
                                <div class="text-base text-gray-400 ">Expired In 6 Months</div>
                                <div class="flex items-center pt-1">
                                    <div class="text-2xl font-bold text-gray-900 ">{{ $kitchen->stats['expiredInSixMonth'] }} item{{ $kitchen->stats['expiredInSixMonth'] > 1 ? 's' : '' }}</div>
                                    <!-- <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-red-600 bg-red-100 rounded-full">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <span>2.5%</span>
                                    </span> -->
                                </div>
                            </div>
                            <div class="p-5 bg-white rounded shadow-sm">
                                <div class="text-base text-gray-400 ">Expired In 1 year</div>
                                <div class="flex items-center pt-1">
                                    <div class="text-2xl font-bold text-gray-900 ">{{ $kitchen->stats['expiredInOneYear'] }} item{{ $kitchen->stats['expiredInOneYear'] > 1 ? 's' : '' }}</div>
                                    <!-- <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <span>5.2%</span>
                                    </span> -->
                                </div>
                            </div>
                            <div class="p-5 bg-white rounded shadow-sm">
                                <div class="text-base text-gray-400 ">Total Items</div>
                                <div class="flex items-center pt-1">
                                    <div class="text-2xl font-bold text-gray-900 ">{{ count($kitchen->items) }} item{{ count($kitchen->items) > 1 ? 's' : '' }}</div>
                                    <!-- <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-green-100 rounded-full">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <span>2.2%</span>
                                    </span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pb-3 flex justify-end space-x-4">
                <form action="{{ route('kitchen.items.create', [$kitchen->id]) }}">
                    <button type="submit" class="bg-purple-500 hover:bg-purple-700 flex justify-center items-center text-white text-sm font-medium px-4 py-3 rounded-md focus:outline-none">New Item</button>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden">
                        <div class="w-full">
                            <div class="bg-white shadow-md rounded">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Name</th>
                                            <th class="py-3 px-6 text-left">Quantity</th>
                                            <th class="py-3 px-6 text-center">Expired At</th>
                                            <th class="py-3 px-6 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @foreach($kitchen->items as $item)
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">{{ $item->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span>{{ $item->quantity }}&nbsp;{{ $item->unit }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <!-- <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span> -->
                                                    <span>
                                                        {{ $item->expired_at->format('d-m-Y H:i A') }}<br>
                                                        <small>{{ $item->expired_at->diffForHumans() }}</small>
                                                    </span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <a href="{{ route('items.show', [$item->id]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('items.destroy', [$item->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure to delete this item?')">
                                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
