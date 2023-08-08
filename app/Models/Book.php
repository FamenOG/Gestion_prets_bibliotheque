<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $table = 'v_book_available';
    use HasFactory;

    protected $fillable = [
        'status',
    ];
    
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
            $this->table = 'books';
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

    public function getStatus() {
        switch ($this->status) {
            case 10:
                return 'Loaned';
                break;
            
            case 0:
                return 'Available';
                break;
            
            case -10:
                return 'Lost';
                break;
        }
    }

}

