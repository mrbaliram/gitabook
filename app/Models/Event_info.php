<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'start_date',
        'end_date',
        'city',
        'state',
        'address1',
        'address2',
        'pin_code',
        'leader_name',
        'leader_contact_no',
        'leader_alternate_no',
        'place_contact_person',
        'place_contact_no',
        'place_alternate_no', 
        'remarks',
    ];
}
