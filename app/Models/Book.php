<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    protected $table='books';
    use HasFactory;
    
    public function __construct(
        $title = '',
        $author = '',
        $publication_date = '',
        $isbn = '',
        $cover = '',
        $summary = ''
    ) {
        $this->title = $title;
        $this->author = $author;
        $this->publication_date = $publication_date;
        $this->isbn = $isbn;
        $this->cover = $cover;
        $this->summary = $summary;
    }
    
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}

