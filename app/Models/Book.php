<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'Price',
        'Image_url',
        'language_id',
        'category_id',
        'author_id',
    ];
}