<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    protected $table = 'categories'; // Corrected the table name definition
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}

