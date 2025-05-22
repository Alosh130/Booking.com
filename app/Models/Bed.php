<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $fillable = [
        'type',
        'custom_type',
        'quantity',
    ];
    public function room(){
        $this->belongsTo(Room::class);
    }
}
