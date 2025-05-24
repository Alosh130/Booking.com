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
                           list="cities" 
                           placeholder="Where are you going?"
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
                           value="{{ request('dates') }}"
                           class="daterange-picker pointer text-slate-400 focus:placeholder:text-slate-500 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm pl-10 h-10"
                           placeholder="Check-in & Check-out"
                           autocomplete="off">
                </div>
            </div>

            {{-- Guests & Rooms --}}
            <div class="space-y-1" x-data="{ open: false, adults: {{ request('adults', 2) }}, children: {{ request('children', 0) }}, rooms: {{ request('rooms', 1) }} }">
                <button type="button" @click="open = !open"
                        class="flex w-full justify-between items-center rounded-md bg-slate-800 px-4 py-2 text-sm text-slate-700 shadow-sm h-10 pointer">
                    <span class="p text-slate-400" x-text="`${adults} ${adults === 1 ? 'adult' : 'adults'}, ${children} ${children === 1 ? 'child' : 'children'}, ${rooms} ${rooms === 1 ? 'room' : 'rooms'}`"></span>
                    <i class="fa-solid fa-chevron-down text-slate-400"></i>
                </button>

                <div x-show="open" x-transition x-cloak @click.outside="open = false"
                     class="absolute z-10 mt-1 w-72 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 p-4 space-y-4 bg-slate-800 text-white">
                    <template x-for="item in [{ label: 'Adults', model: 'adults', min: 1, desc: 'Ages 18+' }, { label: 'Children', model: 'children', min: 0, desc: 'Ages 0-17' }, { label: 'Rooms', model: 'rooms', min: 1 }]">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-white" x-text="item.label"></h3>
                                <p class="text-xs text-slate-400" x-show="item.desc" x-text="item.desc"></p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        @click="window[item.model] > item.min ? window[item.model]-- : null"
                                        class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                    <i class="fa-solid fa-minus text-xs text-red-500"></i>
                                </button>
                                <span :x-text="window[item.model]" class="w-6 text-center"></span>
                                <button type="button"
                                        @click="window[item.model]++"
                                        class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:bg-slate-700">
                                    <i class="fa-solid fa-plus text-xs text-green-500"></i>
                                </button>
                            </div>
                        </div>
                    </template>

                    <input type="hidden" name="adults" x-model="adults">
                    <input type="hidden" name="children" x-model="children">
                    <input type="hidden" name="rooms" x-model="rooms">

                    <button type="button" @click="open = false"
                            class="w-full mt-2 pointer bg-blue-600 text-white py-1 px-4 rounded-md text-sm hover:bg-blue-700">
                        Done
                    </button>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('hotels.index') }}" class="text-sm text-blue-600 hover:underline">Clear</a>
                <button type="submit"
                        class="flex-1 pointer bg-blue-600 text-white py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition">
                    Search
                </button>
            </div>
        </form>
    </article>
    
    <div class="flex">
        <div class="w-64 space-y-4">
            <div class="bg-slate-800 p-4 rounded-xl shadow-md border text-white border-slate-700">
                <h3 class="font-bold text-lg mb-4">Filter by:</h3>
                <form action="{{route('hotels.index')}}">
                    
                    <input type="hidden" name="destination" value="{{ request('destination') }}">
                    <input type="hidden" name="dates" value="{{ request('dates') }}">
                    <input type="hidden" name="adults" value="{{ request('adults', 2) }}">
                    <input type="hidden" name="children" value="{{ request('children', 0) }}">
                    <input type="hidden" name="rooms" value="{{ request('rooms', 1) }}">
    
                {{-- Price Range --}}
                <div class="mb-6" x-data="{ minPrice: {{ request('min_price', 0) }}, maxPrice: {{ request('max_price', 1000) }} }">
                    <h4 class="text-sm font-medium mb-2">Price per night (JOD)</h4>
                    <div class="flex gap-2 mb-2">
                        <input type="number" 
                               x-model="minPrice" 
                               name="min_price" 
                               class="w-full p-1 border rounded text-sm"
                               placeholder="Min"
                               value="{{ request('min_price', '') }}">
                        <input type="number" 
                               x-model="maxPrice" 
                               name="max_price" 
                               class="w-full p-1 border rounded text-sm"
                               placeholder="Max"
                               value="{{ request('max_price', '') }}">
                    </div>
                    <div class="relative pt-2">
                        <div class="h-1 bg-slate-200 rounded"></div>
                        <div class="absolute top-0 h-1 bg-blue-500 rounded" 
                             x-bind:style="'left: ' + (minPrice/2000)*100 + '%; right: ' + (100 - (maxPrice/2000)*100) + '%'">
                        </div>
                    </div>
                </div>
            
                <div class="mb-6">
                    <h4 class="text-sm font-medium mb-2">Star Rating</h4>
                    <div class="space-y-2">
                        @for ($i = 5; $i >= 1; $i--)
                            <label class="flex items-center space-x-2 pointer">
                                <input type="checkbox" 
                                       name="stars[]" 
                                       value="{{ $i }}"
                                       {{ in_array($i, (array)request('stars', [])) ? 'checked' : '' }}
                                       class="rounded border-slate-300 text-blue-600">
                                <span class="text-sm">{{ $i }} {{ $i === 1 ? 'star' : 'stars' }}</span>
                            </label>
                        @endfor
                    </div>
                </div>
            
                <button type="submit" 
                        class="w-full bg-blue-600 pointer text-white py-2 px-4 rounded-md hover:bg-blue-700 text-sm">
                    Apply Filters
                </button>
            </form>
            </div>
        </div>

        {{-- Hotel Listings --}}
        <div>
            <div class="flex items-start">
                <div class="mb-4 font-bold text-2xl pl-16">{{request('destination')}}: {{$hotels->count()}} {{Str::plural('property',$hotels->count())}} found</div>
            </div>
            @if ($hotels)
        <div class="space-y-6 pl-10 ">
            @forelse ($hotels as $hotel)
                <x-hotel-card :$hotel>
                    <div class="mt-4">
                        @if($hotel->rooms()->exists())
                        <x-link-button :href="route('hotels.show', $hotel).'?'.'destination='.request('destination').'&'.'dates='.request('dates').'&'.'adults='.request('adults').'&'.'children='.request('children').'&'.'rooms='.request('rooms')">
                            See availability
                        </x-link-button>
                        @else
                        <p class="text-red-400 pointer default mb-4">No rooms available</p>
                        @php
                            $user = Auth::user();
                        @endphp
                        @if($user && $user->manager->id == $hotel->manager_id)
                        <x-primary-button class="bg-blue-600 hover:bg-blue-700 hover:text-white text-white transition-colors"><a href="{{route('hotels.rooms.create',['hotel'=>$hotel])}}">Add rooms</a></x-primary-button>
                        @endif
                        @endif
                    </div>
                </x-hotel-card>
            @empty
                <div class="bg-slate-800 rounded-lg shadow-md p-6 text-center">
                    <p class="text-slate-600">No hotels found matching your criteria.</p>
                    <a href="{{ route('hotels.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                        Clear filters
                    </a>
                </div>
            @endforelse
        </div>
        
        @else
        @foreach ($filterHotels as $hotel)
            <div class="space-y-6 pl-10">
                <x-hotel-card :$hotel>
                    <div class="mt-4">
                        <x-link-button :href="route('hotels.show', $hotel).'?'.'destination='.request('destination').'&'.'dates='.request('dates').'&'.'adults='.request('adults').'&'.'children='.request('children').'&'.'rooms='.request('rooms')">
                        See availability
                        </x-link-button>
                    </div>
                </x-hotel-card>
            </div>
            @endforeach
        @endif
        </div>
        
    </div>
        
</x-layout>