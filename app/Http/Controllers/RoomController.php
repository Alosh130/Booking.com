<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hotel $hotel)
    {
        Gate::authorize('createRoom', [Room::class,$hotel]);
        return view('hotel.rooms.create', ['hotel'=>$hotel]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Hotel $hotel)
{
    $validated = $request->validate([
        'room_name' => 'required|string|max:255',
        'price_per_night' => 'required|numeric|min:0',
        'cancellation_policy' => 'required|string|in:Free cancellation,Non-refundable,Partial refund',
        'breakfast' => 'required|in:1,0',
        'city_tax' => 'required|numeric|min:0',
        'service_charge' => 'required|numeric|min:0',
        'bed_configurations' => 'required|array|min:1',
        'bed_configurations.*.bed_type' => 'required|string|in:twin,full,queen,king,california_king,custom',
        'bed_configurations.*.custom_bed_type' => 'nullable|string|max:255',
        'bed_configurations.*.quantity' => 'required|integer|min:1',
    ]);

    // Validate required_if manually (workaround for dot-nested validation limitations)
    foreach ($validated['bed_configurations'] as $index => $config) {
        if ($config['bed_type'] === 'custom' && empty($config['custom_bed_type'])) {
            return back()->withErrors([
                "bed_configurations.$index.custom_bed_type" => 'The custom bed type is required when bed type is custom.',
            ])->withInput();
        }
    }

    DB::beginTransaction();

    try {
        // Create the room
        $room = $hotel->rooms()->create([
            'room_name' => $validated['room_name'],
            'price_per_night' => $validated['price_per_night'],
            'cancellation_policy' => $validated['cancellation_policy'],
            'breakfast' => $validated['breakfast'], // Match DB column name
            'city_tax' => $validated['city_tax'],
            'service_charge' => $validated['service_charge'],
        ]);

        // Create bed configurations
        foreach ($validated['bed_configurations'] as $config) {
            $room->beds()->create([
                'type' => $config['bed_type'],
                'custom_type' => $config['bed_type'] === 'custom' ? $config['custom_bed_type'] : null,
                'quantity' => $config['quantity'],
            ]);
        }

        DB::commit();

        return redirect()->route('hotels.show', $hotel)
            ->with('success', 'Room created successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        report($e); // Log it
        return back()->withInput()->with('error', 'Failed to create room.');
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
