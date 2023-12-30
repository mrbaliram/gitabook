<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_sell extends Model
{
    use HasFactory;
     protected $fillable = [
        'book_id',
        'volunteer_id',
        'soled_quantity',
        'price',
        'name',
        'phone',
        'address',
        'remarks',
        'soled_date',       
    ];
}