<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manager extends Model
{
    protected $fillable = [
        'manager_name',
        'phone'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
