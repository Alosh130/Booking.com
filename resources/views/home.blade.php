@vite(['resources/js/app.js', 'resources/css/app.css'])
<x-layout>

    {{-- Search Form --}}
    <article class="mb-8 p-4 bg-slate-800 rounded-xl shadow-md border border-slate-600">
        <form action="{{ route('hotels.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            {{-- Destination --}}
            <div class="space-y-1">
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-location-dot text-slate-400"></i>
                    </div>
                    <input type="text" 
                            required
                           id="destination"
                           name="destination" 
                           value="{{ old('destination') }}"
                           placeholder="Where are you going?"
                           list="cities"
                           class="block text-slate-400 focus:placeholder:text-slate-500 w-full rounded-md border-slate-300 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm h-10"
                           autocomplete="off">
                           <datalist id="cities">
                            @foreach ($governorates as $gov)
                                <option value="{{$gov->Governorate}}">
                            @endforeach
                            @foreach ($cities as $city)
                                <option value="{{ $city->city }}">                  
                            @endforeach
                            </datalist>
                </div>
                
            </div>

            {{-- Date Range --}}
            <div class="space-y-1">
                <div class="relative rounded-md shadow-sm bg-slate-800">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-calendar-days text-slate-400"></i>
                    </div>
                    
                    <input type="text"
                        required 
                       id="dates"
                       name="dates"
                       class="daterange-picker pointer text-slate-400 focus:placeholder:text-slate-500 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm pl-10 h-10"
                       placeholder="Check-in & Check-out"
                       autocomplete="off">
                </div>
            </div>

            {{-- Guests & Rooms --}}
            <div class="space-y-1" x-data="{ open: false, adults: {{ request('adults', 2) }}, children: {{ request('children', 0) }}, rooms: {{ request('rooms', 1) }} }">
                <button type="button" 
                        @click="open = !open"
                        class="flex w-full justify-between items-center rounded-md bg-slate-800 px-4 py-2 text-sm text-slate-700 shadow-sm h-10 pointer">
                    <span class="p text-slate-400" onclick="p()" x-text="`${adults} ${adults === 1 ? 'adult' : 'adults'}, ${children} ${children === 1 ? 'child' : 'children'}, ${rooms} ${rooms === 1 ? 'room' : 'rooms'}`"></span>
                    <i class="fa-solid fa-chevron-down text-slate-400"></i>
                </button>

                {{-- Dropdown --}}
                <div x-show="open" 
                     x-transition
                     x-cloak
                     @click.outside="open = false"
                     class="absolute z-10 mt-1 w-72 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 p-4 space-y-4 bg-slate-800 text-white">
                    {{-- Adults --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-white">Adults</h3>
                            <p class="text-xs text-slate-400">Ages 18+</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="adults > 1 ? adults-- : null"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                <i class="fa-solid fa-minus text-xs text-red-500"></i>
                            </button>
                            <span x-text="adults" class="w-6 text-center"></span>
                            <button type="button" 
                                    @click="adults++"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                <i class="fa-solid fa-plus text-xs text-green-500"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Children --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-white">Children</h3>
                            <p class="text-xs text-slate-400">Ages 0-17</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="children > 0 ? children-- : null"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                <i class="fa-solid fa-minus text-xs text-red-500"></i>
                            </button>
                            <span x-text="children" class="w-6 text-center"></span>
                            <button type="button" 
                                    @click="children++"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                <i class="fa-solid fa-plus text-xs text-green-500"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Rooms --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-white">Rooms</h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="rooms > 1 ? rooms-- : null"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                <i class="fa-solid fa-minus text-xs text-red-500"></i>
                            </button>
                            <span x-text="rooms" class="w-6 text-center"></span>
                            <button type="button" 
                                    @click="rooms++"
                                    class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                <i class="fa-solid fa-plus text-xs text-green-500"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Hidden inputs to submit values --}}
                    <input type="hidden" name="adults" x-model="adults">
                    <input type="hidden" name="children" x-model="children">
                    <input type="hidden" name="rooms" x-model="rooms">

                    <button type="button" 
                            @click="open = false"
                            class="w-full mt-2 pointer bg-blue-600 text-white py-1 px-4 rounded-md text-sm hover:bg-blue-700">
                        Done
                    </button>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('hotels.index') }}" class="text-sm text-blue-600 hover:underline">Clear</a>
                <button type="submit" 
                        class="flex-1  pointer bg-blue-600 text-white py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition">
                    Search
                </button>
            </div>
        </form>
    </article>
</x-layout>
