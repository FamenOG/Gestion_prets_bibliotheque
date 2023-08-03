<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'email',
    ];
}
