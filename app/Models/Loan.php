<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function __construct(
        $client_id = '',
        $librarian_id = '',
        $book_id = '',
        $loan_date = '',
        $back_date = ''
    ) {
        $this->client_id = $client_id;
        $this->librarian_id = $librarian_id;
        $this->book_id = $book_id;
        $this->loan_date = $loan_date;
        $this->back_date = $back_date;
    }
}
