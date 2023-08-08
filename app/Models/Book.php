<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Penalty;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function setTable($table) {
        $this->table = $table;
    }

    public function updateStatus($status) {
        $this->table = 'books';
        $this->update(['status' => $status]);
    }
    
    public function lost(Librarian $librarian, Client $client, Loan $loan) {
        try {
            DB::beginTransaction();
            $this->updateStatus(-10);
            $back = new Back($librarian->id, $loan->id, Carbon::now('Africa/Nairobi'));
            $back->save();
            $penality = new Penalty($back->id, 1, $librarian->id, 3000);
            $penality->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getLate() {
        $datetime1 = new \DateTime($loan->loan_date);
        $datetime2 = new \DateTime($back->back_date);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        return $days;
    }

    
}