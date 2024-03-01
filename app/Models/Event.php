<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'id';
    protected $table = 'events';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Event_name',
        'Event_date',
        'Max_attendees',
        'owner_id',
        'Image'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function reservations (){
        return $this->hasMany(Reservation::class);
    }

    public function owner (){
        return $this->belongsTo(User::class);
    }

   
    
}
