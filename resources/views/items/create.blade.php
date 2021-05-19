<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Kitchen') }} @ {{ $kitchen->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-100 py-6 flex flex-col justify-center">
                <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                        <div class="max-w-md mx-auto">
                            <div class="flex items-center space-x-5">
                                <div class="h-14 w-14 bg-purple-200 rounded-full flex flex-shrink-0 justify-center items-center text-purple-500 text-2xl font-mono">i</div>
                                    <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                        <h2 class="leading-relaxed">New Item</h2>
                                        <p class="text-sm text-gray-500 font-normal leading-relaxed">Adding a new item into your kitchen inventory.</p>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <form action="{{ route('kitchen.items.store', [$kitchen->id]) }}" method="POST">
                                        @csrf
                                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                            <div class="flex flex-col">
                                                <label class="leading-loose">Name</label>
                                                <input type="text" name="name" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Item name" required>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Quantity</label>
                                                    <div class="relative focus-within:text-gray-600 text-gray-400">
                                                        <input type="number" name="quantity" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" value="1" required>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col w-full">
                                                    <label class="leading-loose">Unit</label>
                                                    <div class="relative focus-within:text-gray-600 text-gray-400">
                                                        <select name="unit" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                                                            <option value="piece">Piece</option>
                                                            <option value="packet">Packet</option>
                                                            <option value="bottle">Bottle</option>
                                                            <option value="can">Can</option>
                                                            <option value="percentage">Percentage (%)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <label class="leading-loose">Expired At</label>
                                                <div class="relative focus-within:text-gray-600 text-gray-400">
                                                    <input type="date" name="expired_at" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="25/02/2020" required>
                                                    <div class="absolute left-3 top-2">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-4 flex items-center space-x-4">
                                                <a href="{{ route('kitchen.index') }}" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                                                </a>
                                                <button type="submit" class="bg-purple-500 hover:bg-purple-700 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
