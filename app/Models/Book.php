<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
    
    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function insert($categories) {
        try {
            DB::beginTransaction();
            $this->save();
            foreach ($categories as $category) {
                $category = new Category($category);
                $category->assign($this);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}

