<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'contact_no',
        'alternate_no',
        'address1',
        'address2',
        'city',
        'state',
        'pin_code',
        'event_id',
        'volunteer_id',
        'remarks',
    ];
}
