<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'ticket';
    public $incrementing = false;

    protected $primaryKey = 'id';
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
