<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function signIn($role = 1)
    {
        if ($role > 2) {
            throw new Exception("Role doesn't exist");
        }
        return view('user.sign-in')->with('role', $role);
    }

    public function createUser(Request $request, $role = 1)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|numeric|unique:users|digits:10',
            'password' => 'required',
        ]);
        $client = new User($request->nom, $request->prenom, $request->email,  Hash::make($request->password), $request->telephone, $role);
        $client->save();
        return redirect('/login')->with('role', $role);
    }


    public function login()
    {
        return view('user.login');
    }

    public function doLogin(Request $request)
    {
        $infos = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($infos)) {
            $user = Auth::user(); //? Instance de lutilisateur authentifié
            $request->session()->put('user', $user);
            $request->session()->regenerate();
            return redirect('/list-book');
        } else {
            return redirect('/login')->withErrors([
                "error" => "Les informations de connexion sont invalides."
            ]);
        }
    }
}
