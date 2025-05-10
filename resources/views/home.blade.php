@vite(['resources/js/index.js', 'resources/css/app.css'])
<x-layout>

    {{-- Search Form --}}
    <article class="mb-8 p-4 bg-white rounded-xl shadow-md border border-slate-200">
        <form action="{{ route('hotels.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            {{-- Destination --}}
            <div class="space-y-1">
                <label for="destination" class="block text-sm font-medium text-slate-700">Destination</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-location-dot text-slate-400"></i>
                    </div>
                    <input type="text" 
                            required
                           id="destination"
                           name="destination" 
                           value="{{ request('destination') }}"
                           placeholder="Where are you going?"
                           class="block text-slate-400 focus:placeholder:text-slate-500 w-full rounded-md border-slate-300 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm h-10"
                           autocomplete="off">
                </div>
            </div>

                        {{-- Date Range --}}
            <div class="space-y-1">
                <label for="dates" class="block text-sm font-medium text-slate-700">Dates</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-calendar-days text-slate-400"></i>
                    </div>
                    
                    <input type="text"
                        required 
                       id="dates"
                       name="dates"
                       class="daterange-picker text-slate-400 focus:placeholder:text-slate-500 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm pl-10 h-10"
                       placeholder="Check-in & Check-out"
                       autocomplete="off">
                </div>
            </div>

            {{-- Guests & Rooms --}}
            <div class="space-y-1" x-data="{ open: false, adults: {{ request('adults', 2) }}, children: {{ request('children', 0) }}, rooms: {{ request('rooms', 1) }} }">
                <label class="block text-sm font-medium text-slate-700">Guests & Rooms</label>
                <button type="button" 
                        @click="open = !open"
                        class="flex w-full justify-between items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm text-slate-700 shadow-sm hover:bg-slate-50 h-10">
                    <span class="p text-slate-400" onclick="p()" x-text="`${adults} ${adults === 1 ? 'adult' : 'adults'}, ${children} ${children === 1 ? 'child' : 'children'}, ${rooms} ${rooms === 1 ? 'room' : 'rooms'}`"></span>
                    <i class="fa-solid fa-chevron-down text-slate-400"></i>
                </button>

                {{-- Dropdown --}}
                <div x-show="open" 
                     x-transition
                     x-cloak
                     @click.outside="open = false"
                     class="absolute z-10 mt-1 w-72 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none p-4 space-y-4">
                    {{-- Adults --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-slate-900">Adults</h3>
                            <p class="text-xs text-slate-500">Ages 18+</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="adults > 1 ? adults-- : null"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-100">
                                <i class="fa-solid fa-minus text-xs"></i>
                            </button>
                            <span x-text="adults" class="w-6 text-center"></span>
                            <button type="button" 
                                    @click="adults++"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-100">
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Children --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-slate-900">Children</h3>
                            <p class="text-xs text-slate-500">Ages 0-17</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="children > 0 ? children-- : null"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-100">
                                <i class="fa-solid fa-minus text-xs"></i>
                            </button>
                            <span x-text="children" class="w-6 text-center"></span>
                            <button type="button" 
                                    @click="children++"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-100">
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Rooms --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-slate-900">Rooms</h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="rooms > 1 ? rooms-- : null"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-100">
                                <i class="fa-solid fa-minus text-xs"></i>
                            </button>
                            <span x-text="rooms" class="w-6 text-center"></span>
                            <button type="button" 
                                    @click="rooms++"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-100">
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Hidden inputs to submit values --}}
                    <input type="hidden" name="adults" x-model="adults">
                    <input type="hidden" name="children" x-model="children">
                    <input type="hidden" name="rooms" x-model="rooms">

                    <button type="button" 
                            @click="open = false"
                            class="w-full mt-2 bg-blue-600 text-white py-1 px-4 rounded-md text-sm hover:bg-blue-700">
                        Done
                    </button>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('hotels.index') }}" class="text-sm text-blue-600 hover:underline">Clear</a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors text-sm font-medium h-10">
                    Search
                </button>
            </div>
        </form>
    </article>
    <h1>This is the laptop</h1>
    <h2>This is the PC</h2>
</x-layout>