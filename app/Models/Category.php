<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Exception;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Corrected the table name definition

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function books() {
        return $this->belongsToMany(Book::class);
    }

    public function assign(Book $book) {
        DB::insert('INSERT INTO book_category (book_id, category_id) VALUES (?, ?)', [$book->id, $this->id]);
    }

}

