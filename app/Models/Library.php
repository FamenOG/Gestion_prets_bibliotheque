<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Book
{
    use HasFactory;
    protected $table = 'v_book_loaned';
    protected $fillable = [
        'status',
    ];
    
}
