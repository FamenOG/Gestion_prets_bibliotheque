<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function signIn(){
        return view('user.sign-in');
    }

    public function createClient(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|numeric|unique:users|digits:10',
            'password' => 'required',
        ]);
        $client = new User();
        $client->role_id = 1;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->telephone = $request->telephone;
        $client->password = Hash::make($request->password);

        $client->save();

        return view('user.login')->with('status', 'Votre compte a été crée avec succès');
    }
}
