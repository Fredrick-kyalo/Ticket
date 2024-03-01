<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'event_id',
        'no_of_tickets',
        'reservation_date',
    ];

    protected $dates = [
        'reservation_date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

