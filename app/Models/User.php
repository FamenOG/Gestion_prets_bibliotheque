<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'user';

    public function __construct(
        $name = '',
        $firstname = '',
        $email = '',
        $password = '',
        $telephone = '',
        $role_id = ''
    ) {
        $this->role_id = $role_id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
    }
    
}
