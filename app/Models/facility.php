<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facility extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityFactory> */
    use HasFactory;

    public $icons =
    [
        'fa-wifi','fa-dumbbell','fa-mug-hot'
    ];

    public function hotel():belongsTo{
        return $this->belongsTo(Hotel::class);
    }
}
