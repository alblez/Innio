<?php

namespace Domain\Booking\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'name',
        'starts_at',
        'ends_at',
        'unit_id',
        'client_id',
    ];
}
