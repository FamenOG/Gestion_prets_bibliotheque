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
    protected $fillable = ['name', 'firstname', 'email', 'password', 'telephone', 'role_id', 'numero'];


    public function __construct(
        $name = '',
        $firstname = '',
        $gender = '',
        $email = '',
        $password = '',
        $telephone = '',
        $role_id = '',
        $numero = ''
    ) {
        $this->role_id = $role_id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->numero = $numero;
    }

    public function giveID($role) {
        $this->save();
        if($role==1) {
            $this->update(['numero' => "CLI-" . $this->id]);
        }
        else{
            $this->update(['numero' => "LIB-" . $this->id]);
        }
    }
}
