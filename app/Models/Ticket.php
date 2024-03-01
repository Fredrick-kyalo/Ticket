<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;


    protected $table = 'ticket';
    public $incrementing = false;

    protected $primaryKey = 'ticket_id';
    protected $fillable = [
        'event_id',
        'ticket_type',
        'ticket_price',
        'number'
    ];

    public function event()
{
    return $this->belongsTo(Event::class,'event_id');
}
}
