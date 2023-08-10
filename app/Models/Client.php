<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class Client extends User
{
    protected $table = 'v_client';
    use HasFactory;

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function getBooks() {
        return DB::table('v_book_loaned')->where('client_id', $this->id)->get();
    }

    
}

