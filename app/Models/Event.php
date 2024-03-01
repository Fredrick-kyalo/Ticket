<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'Event_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id', 'Event_id');
    }
}
