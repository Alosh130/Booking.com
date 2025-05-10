<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Season extends Model
{
    /** @use HasFactory<\Database\Factories\SeasonFactory> */
    use HasFactory;
    public function rooms():BelongsToMany{
        return $this->belongsToMany(Room::class,'room_seasons')
        ->withPivot('custom_multiplier')
        ->withTimestamps();
    }
}
