<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = 'v_book_loaned';
    protected $fillable = [
        'status',
    ];
    public function updateStatus($status)
    {
        // $this->setTable('books');
        $this->update(['status' => $status]);
    }
}
