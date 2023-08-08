<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    public function __construct(
        $back_id = '',
        $type_id = '',
        $librarian_id = '',
        $price = ''
    ) {
        $this->back_id = $back_id;
        $this->type_id = $type_id;
        $this->librarian_id = $librarian_id;
        $this->price = $price;
    }
}
