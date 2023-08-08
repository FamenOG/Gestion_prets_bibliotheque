<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Back extends Model
{
    use HasFactory;
    public function __construct(
        $librarian_id = '',
        $loan_id = '',
        $back_date = ''
    ) {
        $this->librarian_id = $librarian_id;
        $this->loan_id = $loan_id;
        $this->back_date = $back_date;
    }

}
