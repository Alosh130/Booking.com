<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    public static $prices = [
        13, 12 , 16
    ];

    public function Hotel():BelongsTo{
        return $this->belongsTo(Hotel::class);
    }
}
