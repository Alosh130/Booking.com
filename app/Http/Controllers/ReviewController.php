<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Hotel;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hotel $hotel)
    {
        return view('hotel.reviews.index', ['hotel'=>$hotel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hotel $hotel)
    {
        return view('hotel.reviews.create',['hotel'=>$hotel]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Hotel $hotel)
    {
        $data = $request->validate([
            'review' => 'required|min:15',
            'rating' => 'required|min:1|max:5|integer'
        ]);

        $hotel->reviews()->create($data);
        return redirect()->route('hotels.reviews.index', $hotel)->with('success', 'Review created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
