<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class facility extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityFactory> */
    use HasFactory;

    public static $names = [
        'fa-wifi'=>'wifi',
        'fa-dumbbell'=>'Gym' ,
        'fa-mug-hot'=>'breakfast' 
    ];

    public static $icons = [
    'fa-wifi','fa-dumbbell','fa-mug-hot'
    ];

    public function hotel():belongsTo{
        return $this->belongsTo(Hotel::class);
    }
}
