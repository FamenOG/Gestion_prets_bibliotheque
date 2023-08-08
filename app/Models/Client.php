<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;

class Client extends User
{
    protected $table = 'v_client';
    use HasFactory;

    public function loans()
    {
        return $this->belongsToMany(Loan::class);
    }

}

