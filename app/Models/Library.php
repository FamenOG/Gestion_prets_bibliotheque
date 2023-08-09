<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Penalty;


class Library extends Book
{
    use HasFactory;
    protected $table = 'v_book_loaned';
    protected $fillable = [
        'status',
    ];
   
}
