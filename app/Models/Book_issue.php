<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_issue extends Model
{
    use HasFactory;


    protected $fillable = [
        'book_id',
        'volunteer_id',
        'issued_quantity',
        'issued_date',
        'remarks',        
    ];
}
