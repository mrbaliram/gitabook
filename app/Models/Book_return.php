<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_return extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'book_id',
        'volunteer_id',
        'returned_quantity',
        'remarks',
        'returned_date',    
       ]; 
}
