<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarian extends User
{
    protected $table = 'v_librarian';
    use HasFactory;

}

