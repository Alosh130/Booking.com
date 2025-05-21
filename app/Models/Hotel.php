<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Hotel extends Model
{
    /** @use HasFactory<\Database\Factories\HotelFactory> */
    use HasFactory;

    public $fillable = [
        'name', 'description', 'rating', 'rating_score', 'Governorate', 
        'distance_from_downtown', 'city', 'url', 'stars'
    ];

    public static $rating_scores =
    [
        9.0 => 'Wonderful',
        8.0 => 'Very Good',
        7.0 => 'Good' ,
        6.0 => 'Pleasant'
    ];

    public function rooms():HasMany{
        return $this->HasMany(Room::class);
    }

    public function reviews():HasMany{
        return $this->hasMany(Review::class);
    }

    public function services():HasMany{
        return $this->hasMany(Service::class);
    }

    public function facilties():HasMany{
        return $this->hasMany(facility::class);
    }

    private function dateRangeFilter(Builder $query,$from = null, $to = null){
        if($from && !$to){
            $query->where('created_at','>=',$from);
        }elseif(!$from && $to){
            $query->where('created_at','<=',$to);
        }elseif($from && $to){
            $query->whereBetween('created_at',[$from,$to]);
        }
    }
    
    public function scopeWithReviewsCount(Builder $query,$from = null, $to = null):Builder|QueryBuilder{
        return $query->withCount([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q,$from,$to)
        ]);
        
    }
}
