<x-card class="mb-4">
    <img class="w-1/4 object-cover rounded-md" src="{{ $hotel->url }}" alt="{{ $hotel->name }}">

    <div class="p-2 flex-1 space-y-1">
            <div>
                <h2 class="text-md font-bold text-blue-900">{{ $hotel->name }}</h2>
                <div class="flex items-center space-x-1 text-yellow-500 text-xs mt-1">
                    <span>
                        <x-star-rating :stars="$hotel->stars"/>
                    </span>
                    <span>
                        @if($hotel->recommended)
                            <i class="fa-solid fa-thumbs-up"></i>
                        @endif
                    </span>
                </div>
                <p class="text-blue-600 text-xs mt-1">
                    <a href="#" class="underline">
                        {{ $hotel->city ? $hotel->city . ', ' : '' }}
                        {{ $hotel->Governorate }}
                    </a>
                    · <a href="#" target="_blank" class="underline">Show on map</a>
                    · {{ $hotel->distance_from_downtown }} km from downtown
                </p>
                <!--Amenities-->
                <div>

                </div>
            </div>
        <div class="mt-3">
            <p class="font-semibold text-blue-700 text=sm">{{$hotel->rooms()->latest()->pluck('room_type')->first()}}</p>
            <p class="text-xs text-gray-600"> 1 double or 2 twins</p>
        </div>
        <div class="mt-2 text-green-600 text-xs space-y-0.5">
            <x-tag :$hotel/>
        </div>
    </div>
    @php
    $diffInDays = 1;
    if(request()->filled('dates')){
            $dateRange = urldecode(request()->input('dates'));
            [$start,$end] = explode(' - ',$dateRange); 

            $dates = explode(' - ',$dateRange);
            $startStr = $dates[0];$endStr = $dates[1];
            $date1 = Carbon\Carbon::parse($startStr);
            $date2 = Carbon\Carbon::parse($endStr);
            $diffInDays = $date1->diffInDays($date2);
        }
    @endphp
    <div class="p-4 flex flex-col justify-between text-right">
        <div>
            <span class="text-gray-600 text-sm font-medium">{{$hotel->rating_score}}</span>
            <span class="bg-blue-800 text-white text-sm px-1 py-0.5 rounded-md">{{$hotel->rating}}</span>
            <div>
                <a class="text-xs text-slate-600" href="{{route('hotels.reviews.index',['hotel' => $hotel])}}"> {{$hotel->reviews()->count()}} {{Str::plural('review',$hotel->reviews()->count())}}</a>
            </div>
        </div>
        <div>
            <p class="text-xs text-gray-600">{{$diffInDays}} {{Str::plural('night',$diffInDays)}}, {{request('adults')}} {{Str::plural('adult',request('adults'))}} {{request('children')? ','.request('children').' '.Str::plural('child',request('children')) :''}} </p>
            <p class="text-md font-bold text-gray-800">JOD {{$hotel->rooms()->latest()->first()->calculatePrice($date1,$date2,request('rooms'))}}</p>
            <p class="text-xs text-gray-500">+JOD {{round($hotel->rooms()->latest()->first()->calculatePrice($date1,$date2,request('rooms')) * ($hotel->rooms()->latest()->first()->service_charge + $hotel->rooms()->latest()->first()->city_tax))}} taxes and fees</p>
        </div>
        {{$slot}}
    </div>
</x-card>