<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer_payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'amount',
        'is_approved',
        'remarks',
        'payment_date',       
    ];
}
