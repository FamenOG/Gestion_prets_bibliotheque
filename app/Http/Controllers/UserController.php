<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login() {
        return view('user.login');
    }

    public function signIn($role = 1) {
        if ($role > 2) {
            throw new Exception("Role doesn't exist");
        }
        return view('user.sign-in')->with('role', $role);
    }

    public function createUser(Request $request, $role = 1) {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|numeric|unique:users|digits:10',
            'password' => 'required',
        ]);
        $client = new User();
        $client->role_id = $role;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->telephone = $request->telephone;
        $client->password = Hash::make($request->password);

        $client->save();

        return view('user.login')->with('status', 'Votre compte a été crée avec succès');
    }


}
