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
    protected $table = 'categories'; 
    protected $fillable=['name'];


    public function __construct($name = '') {
        $this->name = $name;
    }

    public function books() {
        return $this->belongsToMany(Book::class);
    }

}

