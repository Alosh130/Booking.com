<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $fillable = [
        'room_name',
        'price_per_night',
        'cancellation_policy',
        'breakfast',
        'city_tax',
        'service_charge',
    ];
    

        
    public static $room_types =
    [
        1 => [
            'Superior King Room', 'Superior Family Room',
            'Superior Twin Room','Superior Twin Room with Pool View',
            'Superior King Room with Sea View' , 'Superior Twin Room with Sea View',
            'Superior Family Room with Pool View' , 'Superior Family Room with Sea View',
            'King Suite with Sea View','Grand Suite with Sea View'
        ],
        2 => [
            'Premium Twin Room','Premium King Room',
            'Deluxe Double Room' , 'Deluxe Twin Room',
            'Executive King Room' , 'Executive Twin Room',
            'Executive Suite' , 'Presidential Suite',
            'Royal Suite'
        ],
        3 => [
            'King Room','Twin Room',
            'King Room - Club Access', 'Twin Room - Club Access',
            'Twin Room with Marina View','Suite',
            'Suite with Marina View' , 'Prince Suite'
        ],
        4 =>[
            'Tent',
        ],
        5 => [
            'Standard Double Room or Twin Room', 'Superior Room Double or Twin Room',
            'Deluxe Double or Twin Room', 'Junior Suite',
            'Executive Suite','Bristol Suite'
        ]
    ];
    
        public static $bed_types =
        [
            'king bed','queen bed',
            'twin bed',
            'full bed',
        ];

    public function Hotel():BelongsTo{
        return $this->belongsTo(Hotel::class);
    }

    public function Seasons():BelongsToMany{
        return $this->belongsToMany(Season::class,'room_seasons')
        ->withPivot('custom_multiplier')
        ->withTimestamps();
    }   

    public function beds():HasMany{
        return $this->hasMany(Bed::class);
    }

    public function calculatePrice($checkIn,$checkOut,$roomCount = 1){
        $days = Carbon::parse($checkIn)->diffInDays($checkOut);

        $timeFactor = $this->timeBasedDiscount($checkIn);

        $basePricePerNight = $this->minimum_price;

        $totalSingleRoomPrice = 0;

        for($i=0;$i < $days;$i++){
            $currentDate = $checkIn->copy()->addDays($i);
            $seasonMultiplier = $this->seasonMultiplier($currentDate);
            $totalSingleRoomPrice += $basePricePerNight * $seasonMultiplier;
        }

        $totalSingleRoomPrice *= $timeFactor;

        $finalPrice = max($totalSingleRoomPrice,$this->minimum_price);


        if($roomCount === 1) return round($finalPrice,0);

        $finalPrice = $finalPrice + ($finalPrice *($roomCount - 1)*0.9 );

        return round($finalPrice,0);
    }
    public function seasonMultiplier($date){
        $season =  $this->Seasons()
        ->whereDate('start_date','<=',$date)
        ->whereDate('end_date','>=',$date)
        ->first();

        if($season) return $season->pivot->custom_multiplier ?? $season->base_multiplier;

        return 1.0;
    }
    public function timeBasedDiscount($checkIn){
        $daysUntilCheckIn = now()->diffInDays($checkIn,false);

        

        if($daysUntilCheckIn >= 60) return 0.9;

        if($daysUntilCheckIn <= 2) return 1.15; 

        if($daysUntilCheckIn <= 7) return 0.85;

        return 1.0;
    }
}
