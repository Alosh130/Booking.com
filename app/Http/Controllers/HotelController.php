<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Start with base query
    $query = Hotel::query();

    // Apply destination filter if present
    $query->when(request('destination'), function ($query) {
        $query->where('city', 'like', '%'.request('destination').'%')
              ->orWhere('Governorate', 'like', '%'.request('destination').'%');
    });

    // Apply sorting
    $query->orderBy('rating', 'desc');

    // Redirect if required parameters are missing
    if (!request()->filled(['destination', 'dates'])) {
        return redirect('/');
    }

    // Get the results before price filtering
    $hotels = $query->get();

    // Handle price filtering if parameters exist
    if (request()->filled(['min_price', 'max_price'])) {
        [$checkIn, $checkOut] = explode(' - ', request('dates'));

        $checkIn = \Carbon\Carbon::parse($checkIn);
        $checkOut = \Carbon\Carbon::parse($checkOut);
        $roomCount = request()->input('rooms', 1);
        $minPrice = request()->input('min_price', 0);
        $maxPrice = request()->input('max_price', 10000);

        $filteredHotels = $hotels->filter(function($hotel) use ($minPrice, $maxPrice, $checkIn, $checkOut, $roomCount) {
            foreach ($hotel->rooms as $room) {
                $price = $room->calculatePrice($checkIn, $checkOut, $roomCount);
                if ($price >= $minPrice && $price <= $maxPrice) {
                    // Store calculated price on the hotel model
                    $hotel->calculatedPrice = $price;
                    return true;
                }
            }
            return false;
        });

        // Convert filtered collection back to paginator if needed
        $hotels = Hotel::whereIn('id', $filteredHotels->pluck('id'))->get();
    }

    // Handle star rating filtering if present
    if (request()->filled('stars')) {
        $stars = request('stars');
        $hotels = $hotels->filter(function($hotel) use ($stars) {
            return in_array($hotel->stars, (array)$stars);
        });
        
        // Again convert back to proper Eloquent collection
        $hotels = Hotel::whereIn('id', $hotels->pluck('id'))->get();
    }

    return view('hotel.index', [
        'hotels' => $hotels,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hotel $hotel)
    {
        return view('hotel.create',['hotel'=>$hotel]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:10|max:30',
            'description' => 'required|min:50',
            'rating' => 'required|numeric',
            'rating_score' => 'required',
            'city' => 'nullable|min:5|max:20',
            'Governorate' => 'required|min:5',
            'distance_from_downtown' => 'required|numeric|min:0',
            'url' => 'nullable|url',
            'stars' => 'required|integer|min:1|max:5'
        ]);

        Hotel::create($data);

        return redirect('/')->with('success','Hotel Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view('hotel.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
