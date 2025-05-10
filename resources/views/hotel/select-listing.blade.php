<x-layout>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
        
        
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            List your property on Booking.com and start welcoming guests in no time!
        </h2>
        
        <p class="text-gray-600 mb-8">To get started, select the type of property you want to list on Booking.com</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Hotels, B&Bs & More Card -->
            <div class="border border-gray-200 rounded-sm p-4 hover:border-blue-500 hover:shadow-md transition-all">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Hotel, B&Bs & More</h3>
                <img src="{{asset('images/hotel.png')}}" class="w-20 ml-30 mb-4">
                <p class="text-gray-600 mb-2">Properties like hotels, B&Bs, guest houses, hostels, condo hotels, etc.</p>
                <a class="mt-6 text-blue-600 pointer font-medium hover:text-blue-800" href="{{route('hotels.create')}}">Select</a>
            </div> 
        </div>
        
    </div>
</x-layout>