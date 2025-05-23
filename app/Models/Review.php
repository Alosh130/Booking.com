<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Review extends Model
{
    use HasFactory;

    
    protected $fillable = ['review','rating','rating_score'];

    public function hotel():BelongsTo{
        return $this->belongsTo(Hotel::class);
    }
    
}
