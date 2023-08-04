<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    public function __construct(
        $nom = '',
        $prenom = '',
        $email = '',
        $password = '',
        $telephone = '',
        $role_id = ''
    ) {
        $this->role_id = $role_id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
    }
    
}
