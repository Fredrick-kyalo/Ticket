<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'reservations';
    public $incrementing = false;
    protected $primarykey = 'id';

    protected $fillable = [
        'event_id',
        'email',
        'no_of_tickets',
        'reservation_date'
    ];

    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }

}
